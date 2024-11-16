<?php

namespace App\Jobs;

use App\Service\DataProcessorService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductInteractionJob implements ShouldQueue
{
    use Queueable;

    protected $userId;
    protected $cookieId;
    protected $productId;

    public function __construct(
        $userId,
        $cookieId,
        $productId
    ) {
        $this->userId = $userId;
        $this->cookieId = $cookieId;
        $this->productId = $productId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $dataProcessorService = app(DataProcessorService::class);
        $dataProcessorService->productInteraction(
            $this->userId,
            $this->cookieId,
            $this->productId
        );
    }
}
