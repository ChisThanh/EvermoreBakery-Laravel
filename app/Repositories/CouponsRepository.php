<?php


namespace App\Repositories;

use App\Models\Coupon;

class CouponsRepository extends BaseRepository
{
    protected function getModel()
    {
        return Coupon::class;
    }

    public function getCoupons()
    {
        return $this->model
            ->with('images')
            ->where('expires_at', '>', now())
            ->orderBy('created_at', 'desc')
            ->get();
    }
}