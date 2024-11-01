<?php


namespace App\Service;

use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    protected $repository;
    public function __construct(
    ) {
        $this->repository = ProductRepository::getInstance();
    }
}