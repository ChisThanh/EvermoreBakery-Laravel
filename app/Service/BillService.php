<?php


namespace App\Service;

use App\Models\Bill;
use App\Repositories\BillRepository;
use App\Repositories\CouponsRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CartRepository;

class BillService extends BaseService
{
    protected $repository;
    protected $productRepository;
    protected $cartRepository;
    protected $couponRepository;
    protected $vnPayService;

    public function __construct(
        BillRepository $repository,
        ProductRepository $productRepository,
        CartRepository $cartRepository,
        CouponsRepository $couponRepository,
        VnPayService $vnPayService
    ) {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->couponRepository = $couponRepository;
        $this->vnPayService = $vnPayService;
    }

    public function store(array $data): mixed
    {
        try {
            \DB::beginTransaction();
            $ids = array_keys($data['products']);
            $products = $this->productRepository
                ->getModel()
                ->whereIn('id', $ids)
                ->get();
            $user = auth()->user();

            $paymentMethod = $data['payment'] == 'card' ? Bill::PAYMENT_METHOD_CARD : Bill::PAYMENT_METHOD_CASH;
            $bill = $this->repository->create([
                'user_id' => $user->id,
                'total' => 0,
                'status' => Bill::STATUS_PENDING,
                'payment_status' => Bill::PAYMENT_UNPAID,
                'payment_method' => $paymentMethod,
                'note' => $data['note'],
            ]);

            $billDetail = [];
            $total = 0;
            foreach ($products as $product) {
                $quantity = $data['products'][$product->id]['quantity'];
                $billDetail[] = [
                    'bill_id' => $bill->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price_sale,
                ];
                $total += (int) $product->price_sale * (int) $quantity;
            }
            $bill->total = $total + 50000;
            $bill->details()->createMany($billDetail);

            $address = [
                'name' => $data['name'],
                'street' => $data['street'],
                'city' => $data['city'],
                'district' => $data['district'],
                'ward' => $data['ward'],
                'phone' => $data['phone'],
            ];

            if (isset($data['coupon_code'])) {
                $coupon = $this->getCoupons($data['coupon_code'])['data'];
                if (isset($coupon) && $coupon->quantity > 0) {
                    $bill->coupon_id = $coupon->id;
                    $discountByAmount = $bill->total - $coupon->discount_amount;
                    $discountByPercentage = $bill->total * (1 - $coupon->discount_percentage / 100);
                    $bill->total = min([$discountByAmount, $discountByPercentage]);
                    $coupon->quantity -= 1;
                    $coupon->save();
                }
            }

            $bill->address()->create($address);
            $bill->save();

            if ($data['payment'] == 'card') {
                $url = $this->vnPayService->vnpay([
                    'bill_id' => "HD_" . $bill->id . "_" . time(),
                    'amount' => $bill->total,
                ]);
                \DB::commit();
                return [
                    'success' => true,
                    'url' => $url,
                ];
            }
            cookie()->forget('cart_id');
            $this->cartRepository->getModel()->where('user_id', $user->id)->delete();
            \DB::commit();
        } catch (\Exception $th) {
            \DB::rollBack();
            return [
                'success' => false,
                'message' => $th->getMessage(),
            ];
        }
        return ['success' => true];
    }

    public function getAddressUser(): mixed
    {
        $user = auth()->user();
        $model = $this->repository->getModel();
        $data = $model->where('user_id', $user->id)
            ->latest()
            ->first();
        if (!$data) {
            return [
                'success' => false,
                'message' => 'Chưa có hóa đơn nào',
                'data' => null,
            ];
        }
        $data = $data->address;
        return [
            'success' => true,
            'data' => $data,
        ];
    }

    public function getCoupons($code): mixed
    {
        $coupons = $this->couponRepository->getModel()->where('code', $code)->first();
        if (!$coupons) {
            return [
                'success' => false,
                'message' => 'Coupon not found',
            ];
        }
        return [
            'success' => true,
            'data' => $coupons,
        ];
    }

    public function updateBillStatusPayment($inputs): mixed
    {
        $responseCode = $inputs['vnp_ResponseCode'] ?? null;
        $transactionStatus = $inputs['vnp_TransactionStatus'] ?? null;

        if ($responseCode === '00' || $transactionStatus === '00') {
            $billId = explode('_', $inputs['vnp_TxnRef'])[1];
            $bill = $this->repository->getModel()->find($billId);

            if ($bill) {
                $bill->payment_status = Bill::PAYMENT_PAID;
                $bill->id_payment = $inputs['vnp_TxnRef'];
                $bill->save();

                $this->clearUserCart();
                return [
                    'success' => true,
                    'message' => 'Thanh toán hóa đơn thành công',
                ];
            }
        }

        $this->clearUserCart();
        return [
            'success' => false,
            'message' => 'Thanh toán hóa đơn thất bại',
        ];
    }

    private function clearUserCart(): void
    {
        $userId = auth()->id();
        cookie()->forget('cart_id');
        $this->cartRepository->getModel()->where('user_id', $userId)->delete();
    }

}
