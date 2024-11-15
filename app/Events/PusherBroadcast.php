<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PusherBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $channel;
    public mixed $userName;
    public string $message;

    public function __construct(string $channel, mixed $userName, string $message)
    {
        $this->channel = $channel;
        $this->userName = $userName;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return [$this->channel];
    }
    public function broadcastAs()
    {
        return 'chat';
    }
    public function broadcastWith()
    {
        return [
            'user' => $this->userName,
            'message' => $this->message,
        ];
    }
}
