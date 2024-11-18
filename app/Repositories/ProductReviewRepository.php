<?php


namespace App\Repositories;

use App\Models\ProductReview;

class ProductReviewRepository extends BaseRepository
{
    protected function getModel()
    {
        return ProductReview::class;
    }
}