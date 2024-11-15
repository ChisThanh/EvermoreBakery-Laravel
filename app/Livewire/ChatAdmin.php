<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;


class ChatAdmin extends Component
{
    public $users;
    public $selectedUserId;
    public $selectedUser;

    public function mount()
    {
        $currentUserId = backpack_auth()->user()->id;

        $this->users = User::where('id', '!=', $currentUserId)
            ->select('id', 'name')
            ->limit(10)
            ->get();

        if ($this->users->isNotEmpty()) {
            $this->selectedUserId = $this->users->first()->id;
            $this->selectedUser = $this->users->first();
        }
    }

    public function selectUser($userId, $user)
    {
        $this->selectedUserId = $userId;
        $this->selectedUser = $user;
    }

    public function render()
    {
        return view('livewire.chat-admin');
    }
}
