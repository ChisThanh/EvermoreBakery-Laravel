<?php

namespace App\Jobs;

use App\Service\GeminiService;
use App\Service\MeilisearchService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Queue\Queueable;


class SyncKeywords implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $text,
    ) {

    }
    public function handle(): void
    {
        $geminiService = app(GeminiService::class);
        $meilisearchService = app(MeilisearchService::class);
        $result = $geminiService->generateKeywords($this->text);
        $meilisearchService->syncIndexKeywords($result);
    }
}
