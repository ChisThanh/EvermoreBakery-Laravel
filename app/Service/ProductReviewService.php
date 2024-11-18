<?php


namespace App\Service;

use App\Repositories\ProductReviewRepository;


class ProductReviewService extends BaseService
{
    protected $repository;
    public function __construct(
        ProductReviewRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function getAllReview($product_id)
    {
        $data = $this->repository->whereAll('product_id', $product_id);
        return $data;
    }
    public function checkReview($product_id, $userId)
    {
        $userId = auth()->id();
        $data = \DB::table('bills')
            ->join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
            ->where('bill_details.product_id', $product_id)
            ->where('bills.user_id', $userId)
            ->count();
        return $data;
    }
}