<?php


namespace App\Repositories;

use App\Models\ProductReview;

class ProductReviewRepository extends BaseRepository
{
    public function getModel()
    {
        return new ProductReview();
    }
}