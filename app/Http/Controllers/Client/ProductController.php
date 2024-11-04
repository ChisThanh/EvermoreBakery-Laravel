<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(
        ProductService $productService
    ) {
        $this->productService = $productService;
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
        $cookie_id = null;

        if (!auth()->check()) {
            $cookie_id = request()->cookie('cart_id') ?? \Str::random(32);
            \Cookie::queue('cart_id', $cookie_id, 60 * 24 * 30);
        }

        $check = $this->productService->addToCart($slug, $cookie_id);

        if (!$check) {
            return abort(404);
        }

        return redirect()->back()->with('success', 'Add to cart successfully');
    }
}
