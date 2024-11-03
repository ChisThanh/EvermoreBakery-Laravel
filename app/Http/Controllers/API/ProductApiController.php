<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Service\ProductService;
use Illuminate\Support\Facades\Request;

class ProductApiController extends BaseApiController
{
    public function __construct(
        ProductService $service
    ) {
        $this->service = $service;
    }
}