<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\ChatService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected $chatService;
    public function __construct(
        ChatService $chatService
    ) {
        $this->chatService = $chatService;
    }
    public function index()
    {
        $userId = backpack_auth()->user()->id;
        $users = User::whereNotIn('id', [$userId])->get();
        return view('vendor.backpack.ui.customs.chat', compact('users'));
    }

    public function broadcast(Request $request)
    {
        $inputs = $request->validate([
            'message' => 'required',
            'channel' => 'required',
            'admin' => 'required',
        ]);

        $user = backpack_auth()->user();
        $res = $this->chatService->broadcast($inputs, $user);

        if ($res['success'] == false)
            return response()->json($res);

        return response()->json($res);
    }
}
