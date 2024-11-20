<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\CouponService;
use App\Service\DataProcessorService;
use App\Service\ProductService;

class HomeController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $couponService;
    protected $dataProcessorService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService,
        CouponService $couponService,
        DataProcessorService $dataProcessorService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->couponService = $couponService;
        $this->dataProcessorService = $dataProcessorService;
    }

    public function index()
    {
        $products = $this->productService->getProductHome();
        if (env('APP_ENV') == 'local') {
            $categories = $this->categoryService->getCategoryHome();
        } else {
            $categories = cache()
                ->remember('categories_home', 60 * 24, function () {
                    return $this->categoryService->getCategoryHome();
                });
        }

        try {
            $recommendProducts = $this->dataProcessorService->recommendProducts([
                'user_id' => auth()->id() ?? 0,
                'cookie_id' => request()->cookie('cookie_id') ?? 'tmp',
            ]);
            $recommendProducts = $recommendProducts['data'];
        } catch (\Exception $e) {
            $recommendProducts = [];
        }

        return view('clients.home', compact('products', 'categories', 'recommendProducts'));
    }

    public function blog()
    {
        $coupons = $this->couponService->getCoupons();
        $coupons = $coupons['data'];
        return view('clients.blog', compact('coupons'));
    }

    public function about()
    {
        return view('clients.about');
    }

    public function contact()
    {
        return view('clients.contact');
    }
}
