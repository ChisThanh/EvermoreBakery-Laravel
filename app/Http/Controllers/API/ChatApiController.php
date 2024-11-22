<?php

namespace App\Http\Controllers\API;

use App\Service\ChatService;
use Illuminate\Http\Request;

class ChatApiController extends BaseApiController
{
    protected $chatService;
    public function __construct(
        ChatService $chatService
    ) {
        $this->chatService = $chatService;
    }

    public function getHistory($chatId)
    {
        $res = $this->chatService->getHistory($chatId);

        if ($res['success'] == false) 
            return $this->makeResponse($res['message'], 404);
        
        return $this->makeResponse("Chat history fetched successfully", 200, $res['data']);
    }
    public function broadcast(Request $request)
    {
        $inputs = $request->validate([
            'message' => 'required',
            'channel' => 'required',
        ]);
        
        $user = auth()->user();
        $res = $this->chatService->broadcast($inputs, $user);
        
        if ($res['success'] == false) 
            return $this->makeResponse($res['message'], 400);
        
        return $this->makeResponse("Message broadcasted successfully", 200, $res['data']);
    }
}
