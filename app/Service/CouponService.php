<?php


namespace App\Service;

use App\Repositories\CouponsRepository;


class CouponService extends BaseService
{
    protected $repository;
    public function __construct(
        CouponsRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function getCoupons()
    {
        $data = $this->repository->getCoupons();
        return ['success' => true, 'data' => $data];
    }
}