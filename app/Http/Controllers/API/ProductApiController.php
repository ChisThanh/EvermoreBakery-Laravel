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

    public function likeProduct($slug){
        $res = $this->service->likeProduct($slug);
        return $this->makeResponse("Liked product successfully", 200, $res);
    }

    public function getCoupons($code){
        $res = $this->billService->getCoupons($code);
        return $this->makeResponse("Get coupons successfully", 200, $res);
    }

}