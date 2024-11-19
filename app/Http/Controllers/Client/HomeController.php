<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\CouponService;
use App\Service\ProductService;
use Database\Seeders\CouponSeeder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $couponService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService,
        CouponService $couponService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->couponService = $couponService;
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

        return view('clients.home', compact('products', 'categories'));
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
