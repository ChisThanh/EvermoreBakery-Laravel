<?php

namespace App\Jobs;

use App\Service\DataProcessorService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GenerateKeywordJob implements ShouldQueue
{
    use Queueable;

    protected $productId;
    protected $text;

    public function __construct(
        $productId,
        $text
    ) {
        $this->productId = $productId;
        $this->text = $text;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $dataProcessorService = app(DataProcessorService::class);
        $dataProcessorService->generateKeywords(
            $this->productId,
            $this->text
        );
    }
}
