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
        $productRecommend = $data['recommend'];
        $data = $data['data'];
        return view(
            'clients.product-details',
            compact('data', 'productRecommend')
        );
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
    
    public function reviewProduct(Request $request, $slug) {
        $inputs = [
            'slug' => $slug,
            'review' => $request->review,
            'rating' => 5,
        ];
        $data = $this->productService->reviewProduct($inputs);
        if ($data['success'] === false)
            return redirect()->back()->with('error', $data['message']);
        return redirect()->back()->with('success', 'Bình luận thành công');
        
    }
}
