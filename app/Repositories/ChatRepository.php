<?php


namespace App\Repositories;

use App\Models\Chat;

class ChatRepository extends BaseRepository
{
    protected function getModel()
    {
        return Chat::class;
    }

    public function getHistory($chatId)
    {
        $history = $this->model->where('chat_id', $chatId)
            ->orderBy('created_at', 'asc')
            ->get();
        return $history;
    }

}