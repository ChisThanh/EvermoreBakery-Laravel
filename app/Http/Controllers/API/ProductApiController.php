<?php

namespace App\Http\Controllers\API;

use App\Service\BillService;
use App\Service\ProductService;

class ProductApiController extends BaseApiController
{
    protected $billService;
    public function __construct(
        ProductService $service,
        BillService $billService
    ) {
        $this->service = $service;
        $this->billService = $billService;
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
}