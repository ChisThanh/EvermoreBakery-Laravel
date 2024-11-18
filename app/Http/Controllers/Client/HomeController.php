<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        // $products = cache()->remember('products_home', 60 * 24, function () {
        //     return $this->productService->getProductHome();
        // });

        // $categories = cache()->remember('categories_home', 60 * 24, function () {
        //     return $this->categoryService->getCategoryHome();
        // });
        $products = $this->productService->getProductHome();
        $categories = $this->categoryService->getCategoryHome();
        return view('clients.home', compact('products', 'categories'));
    }

    public function blog()
    {
        return view('clients.blog');
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
