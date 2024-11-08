<?php


namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;

class CartRepository extends BaseRepository
{
    public function getModel()
    {
        return new Cart();
    }

}