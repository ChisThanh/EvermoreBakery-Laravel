<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // public function index()
    // {
    //     $userAuth = Auth::id();
    //     $users = User::whereNotIn('id', [$userAuth])->get();
    //     return view(
    //         'admin.chat.index',
    //         [
    //             'users' => $users,
    //         ]
    //     );
    // }
    public function broadcast(Request $request)
    {
        // $sender_id = Auth::id();
        // $message = $request->get('message');

        // // phát sóng sự kiện
        // // broadcast(new PusherBroadcast($message, $sender_id, $receiver_id))->toOthers();
        // return $request->get('message');
    }
}
