<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Jobs\SyncKeywords;
use App\Service\GeminiService;
use App\Service\MeilisearchService;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function __construct(
        private MeilisearchService $meilisearchService
    ) {
    }

    public function search(Request $request)
    {
        if (empty($request->q)) {
            return response()->json(['message' => 'Query is required.'], 400);
        }
        $result = $this->meilisearchService->searchKeywords($request->q);
        return response()->json($result);
    }

    public function generate(Request $request)
    {
        if (empty($request->text)) {
            return response()->json(['message' => 'Text is required.'], 400);
        }

        SyncKeywords::dispatch($request->text);
        return response()->json(['message' => 'Keywords are being generated.']);
    }


}
