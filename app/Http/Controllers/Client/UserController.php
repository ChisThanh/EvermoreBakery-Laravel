<?php

namespace App\Http\Controllers\Client;

use App\Models\User;

class UserController extends BaseController
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
