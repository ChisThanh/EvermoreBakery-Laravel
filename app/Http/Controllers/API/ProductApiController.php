<?php

namespace App\Http\Controllers\API;

use App\Service\BillService;
use App\Service\DataProcessorService;
use App\Service\ProductService;

class ProductApiController extends BaseApiController
{
    protected $billService;
    protected $dataProcessorService;
    public function __construct(
        ProductService $service,
        BillService $billService,
        DataProcessorService $dataProcessorService
    ) {
        $this->service = $service;
        $this->billService = $billService;
        $this->dataProcessorService = $dataProcessorService;
    }

    public function likeProduct($slug)
    {
        $res = $this->service->likeProduct($slug);
        return $this->makeResponse("Liked product successfully", 200, $res);
    }

    public function getCoupons($code)
    {
        $res = $this->billService->getCoupons($code);
        if ($res['success'] === false)
            return $this->makeResponse("Có lỗi xãy ra", 400);
        return $this->makeResponse("Get coupons successfully", 200, $res['data']);
    }

    public function addToCart($slug)
    {
        $res = $this->service->addToCart($slug);
        if ($res === false)
            return $this->makeResponse("Add to cart failed", 400);
        return $this->makeResponse("Add to cart successfully", 200, $res);
    }

    public function updateFromCart($slug, $quantity)
    {
        $check = $this->service->updateFromCart($slug, $quantity);
        if (!$check)
            return $this->makeResponse("Update from cart failed", 400);
        return $this->makeResponse("Update from cart successfully", 200);
    }

    public function recommendKeywords($query)
    {
        $res = $this->dataProcessorService->recommendKeywords($query);
        if ($res['success'] === false)
            return $this->makeResponse("No recommend", 400);
        return $this->makeResponse("Recommend keywords successfully", 200, $res['data']);
    }

    public function recommendProducts()
    {
        $inputs = [
            'user_id' => auth()->id() ?? 0,
            'cookie_id' => request()->cookie('cookie_id') ?? 'tmp',
        ];
        $res = $this->dataProcessorService->recommendProducts($inputs);
        return $this->makeResponse("Recommend products successfully", 200, $res['data']);
    }
}