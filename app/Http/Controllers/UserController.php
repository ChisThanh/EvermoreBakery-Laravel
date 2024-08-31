<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setModel()
    {
        $this->model = new User();
    }
    public function setView()
    {
        $this->view = 'users';
    }
}
