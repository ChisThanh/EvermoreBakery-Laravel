<?php

namespace App\Jobs;

use App\Service\GeminiService;
use App\Service\TypesenseService;
use Illuminate\Contracts\Queue\ShouldQueue;
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
        $typesenseService = app(TypesenseService::class);
        $result = $geminiService->generateKeywords($this->text);
        $typesenseService->syncIndexKeywords($result);
    }
}
