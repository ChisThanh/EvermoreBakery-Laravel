<?php

namespace App\Jobs;

use App\Service\DataProcessorService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CheckProductReviewJob implements ShouldQueue
{
    use Queueable;

    protected $userId;
    protected $product_id;
    protected $review;

    public function __construct(
        $userId,
        $product_id,
        $review
    ) {
        $this->userId = $userId;
        $this->product_id = $product_id;
        $this->review = $review;
    }

    public function handle(): void
    {
        $dataProcessorService = app(DataProcessorService::class);
        $dataProcessorService->checkProductReview([
            'user_id' => $this->userId,
            'product_id' => $this->product_id,
            'text' => $this->review,
        ]);
    }
}
