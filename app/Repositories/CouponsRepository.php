<?php


namespace App\Repositories;

use App\Models\Coupon;

class CouponsRepository extends BaseRepository
{
    protected function getModel()
    {
        return Coupon::class;
    }

}