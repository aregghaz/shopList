<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostPublished implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification;

    public function __construct($notification) {
        $this->notification = $notification;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn() {
        return new Channel('notification');
    }

    public function broadcastWith() {
        return [
            'title' => $this->notification->title,
        ];
    }
}