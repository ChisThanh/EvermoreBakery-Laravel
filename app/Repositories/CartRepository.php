<?php


namespace App\Repositories;

use App\Models\Cart;

class CartRepository extends BaseRepository
{
    protected function getModel()
    {
        return Cart::class;
    }

}