<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $receiver;
    public $message;

    public function __construct(User $receiver, string $message)
    {
        $this->receiver = $receiver;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('public'); // or use `new Channel('chat.' . $this->receiver->id)` for private
    }
    
    

    public function broadcastAs()
    {
        return 'chatMessage';
    }
}
