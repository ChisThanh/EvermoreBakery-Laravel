<?php


namespace App\Repositories;

use App\Models\Coupon;

class CouponsRepository extends BaseRepository
{
    public function getModel()
    {
        return new Coupon();
    }

}