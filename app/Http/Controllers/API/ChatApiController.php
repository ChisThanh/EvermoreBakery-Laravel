<?php

namespace App\Http\Controllers\API;

use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use App\Service\DataProcessorService;
use Illuminate\Http\Request;

class ChatApiController extends BaseApiController
{
    protected DataProcessorService $dataProcessorService;
    public function __construct(
        DataProcessorService $dataProcessorService
    )
    {
        $this->dataProcessorService = $dataProcessorService;
    }
    public function broadcast(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'channel' => 'required',
        ]);

        $user = auth()->user();

        if (is_null($user->chat_id)) {
            $user->chat_id = $validatedData['channel'];
            $user->save();
        }
        if($user->is_chatbot == 0){
            $res = $this->dataProcessorService->chatbot($validatedData);
            if($res['success'] == true){
                $data = [
                    'user' => $res['data']['user'],
                    'answer' => $res['data']['answer'],
                    'message' => $validatedData['message'],
                ];
            }
        }else{
            broadcast(new PusherBroadcast(
                $validatedData['channel'],
                $user->name,
                $validatedData['message']
            ));
            $data = ['message' => $validatedData['message']];
        }

        return $this->makeResponse(
            "Broadcasted successfully",
            200,
            $data
        );
    }
}
