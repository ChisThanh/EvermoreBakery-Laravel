<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $userId = backpack_auth()->user()->id;
        $users = User::whereNotIn('id', [$userId])->get();
        return view('vendor.backpack.ui.custom.chat', compact('users'));
    }
}
