<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Service\BillService;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $billService;
    public function __construct(
        ProductService $productService,
        BillService $billService,
    ) {
        $this->productService = $productService;
        $this->billService = $billService;
    }

    public function index()
    {
        return view('clients.products');
    }

    public function show($slug)
    {
        $data = $this->productService->show($slug);
        if ($data['success'] === false)
            return redirect()->back()->with('error', $data['message']);
        $data = $data['data'];
        return view('clients.product-details', compact('data'));
    }

    public function addToCart($slug)
    {
        $data = $this->productService->addToCart($slug);
        if ($data['success'] === false)
            return redirect()->back()->with('error', $data['message']);
        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công');
    }
    public function buyNow($slug)
    {
        $data = $this->productService->addToCart($slug);
        if ($data['success'] === false)
            return redirect()->back()->with('error', $data['message']);
        return redirect('/checkout');
    }

    public function updateFromCart($slug, $quantity)
    {
        $data = $this->productService->updateFromCart($slug, $quantity);
        if ($data['success'] === false)
            return redirect()->back()->with('error', $data['message']);
        return redirect()->back()->with('success', 'Update from cart successfully');
    }

    public function cart()
    {
        $data = $this->productService->showCart();
        if ($data['success'] === false)
            return redirect()->back()->with('error', $data['message']);
        return view('clients.cart', compact('data'));
    }

    public function checkout()
    {
        $data = $this->productService->showCart();
        $address = $this->billService->getAddressUser();
        $user = auth()->user();

        if (sizeof($data['cartDetails']) <= 0)
            return redirect()
                ->route('products')
                ->with('error', "Chưa có sản phẩm trong giỏ hàng");

        $address = $address['data'];
        return view(
            'clients.checkout',
            compact('data', 'address', 'user')
        );
    }

    public function HandleCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'note' => 'string|nullable',
            'payment' => 'required',
        ], [
            'name.required' => 'Tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'street.required' => 'Đường không được để trống',
            'city.required' => 'Thành phố không được để trống',
            'district.required' => 'Quận không được để trống',
            'ward.required' => 'Phường không được để trống',
            'payment.required' => 'Phương thức thanh toán không được để trống',
        ]);

        $data = $this->billService->store($request->all());

        if ($data['success'] === false)
            return redirect()->back()->with('error', $data['message']);

        if (isset($data['url']))
            return redirect($data['url']);

        return redirect()
            ->route('products')
            ->with('success', 'Đặt hàng thành công');
    }

    public function CheckoutCallback(Request $request)
    {
        $inputs = $request->validate([
            "vnp_TransactionStatus" => "required",
            "vnp_ResponseCode" => "required",
            "vnp_TxnRef" => "required",
        ]);

        $data = $this->billService->updateBillStatusPayment($inputs);

        if ($data['success'] === false)
            return redirect()->route('products')
                ->with('error', $data['message']);

        return redirect()
            ->route('products')
            ->with('success', 'Đặt hàng thành công');
    }
}
