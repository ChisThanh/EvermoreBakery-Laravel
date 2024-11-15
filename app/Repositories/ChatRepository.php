<?php


namespace App\Repositories;

use App\Models\Chat;

class ChatRepository extends BaseRepository
{
    public function getModel()
    {
        return new Chat();
    }

}