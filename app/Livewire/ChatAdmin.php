<?php
namespace App\Livewire;

use App\Models\Chat;
use Livewire\Component;
use App\Models\User;

class ChatAdmin extends Component
{
    public $users;
    public $selectedUser;
    public $history = [];

    public function mount()
    {
        $currentUserId = backpack_auth()->user()->id;

        $this->users = User::where('id', '!=', $currentUserId)
            ->where('chat_id', '!=', null)
            ->select('id', 'name', 'chat_id', 'is_chatbot')
            ->get();

        if (!$this->users->isEmpty()) {
            $this->selectedUser = $this->users->first();
            $this->getHistory($this->selectedUser['chat_id']);
        }
    }

    public function selectUser($user)
    {
        $this->selectedUser = $user;
        $this->getHistory($user['chat_id']);
    }

    public function render()
    {
        return view('livewire.chat-admin');
    }

    private function getHistory($chatId)
    {
        $history = Chat::where('chat_id', $chatId)
            ->orderBy('created_at', 'asc')
            ->get();

        if ($history->isEmpty())
            $this->history = [];
        else
            $this->history = $history;
    }

    public function toggleChatbot($userId)
    {
        $user = User::find($userId);
        $user->is_chatbot = !$user->is_chatbot;
        $user->save();
        $this->selectedUser = $user;
    }
}
