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
        BillService $billService
    ) {
        $this->productService = $productService;
        $this->billService = $billService;
    }

    public function index()
    {
        $data = $this->productService->index(request()->all());
        return view('clients.products', compact('data'));
    }

    public function show($slug)
    {
        $data = $this->productService->show($slug);
        return view('clients.product-details', compact('data'));
    }

    public function addToCart($slug)
    {
        $check = $this->productService->addToCart($slug);

        if (!$check)
            return abort(404);

        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công');
    }

    public function updateFromCart($slug, $quantity)
    {
        $check = $this->productService->updateFromCart($slug, $quantity);

        if (!$check)
            return abort(404);

        return redirect()->back()->with('success', 'Update from cart successfully');
    }

    public function cart()
    {
        $data = $this->productService->showCart();
        return view('clients.cart', compact('data'));
    }

    public function checkout()
    {
        $data = $this->productService->showCart();
        $address = $this->billService->getAddressUser();
        $user = auth()->user();
        return view('clients.checkout', compact('data', 'address', 'user'));
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

        $res = $this->billService->store($request->all());
        if (isset($res['url']))
            return redirect($res['url']);

        if (!$res)
            return abort(404);

        return redirect()->route('products')->with('success', 'Đặt hàng thành công');
    }
}
