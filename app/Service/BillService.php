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


    public function __construct(
        BillRepository $repository,
        ProductRepository $productRepository,
        CartRepository $cartRepository,
        CouponsRepository $couponRepository
    ) {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->couponRepository = $couponRepository;
    }

    public function create(array $data): mixed
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
                'payment' => '',
            ];

            if ($data['payment'] == 'card') {
                $payment = [
                    "card_number" => $data['card-number'],
                    "holder_name" => $data['holder-name'],
                    "expiration_date" => $data['expiration-date'],
                    "cvc" => $data['cvc'],
                ];
                $address['payment'] = json_encode($payment);
            }

            if (isset($data['coupon_code'])) {
                $coupon = $this->getCoupons($data['coupon_code']);
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

            cookie()->forget('cart_id');
            $this->cartRepository->getModel()->where('user_id', $user->id)->delete();

            \DB::commit();
        } catch (\Exception $th) {
            \DB::rollBack();
            return false;
        }
        return true;
    }

    public function getAddressUser(): mixed
    {
        $user = auth()->user();
        $model = $this->repository->getModel();
        $data = $model->where('user_id', $user->id)->latest()->first();
        return $data;
    }

    public function getCoupons($code): mixed
    {
        $coupons = $this->couponRepository->getModel()->where('code', $code)->first();
        if (!$coupons) {
            return false;
        }
        return $coupons;
    }
}