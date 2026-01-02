<?php

namespace Domain\Member\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmailVerifyEvent implements \Illuminate\Contracts\Broadcasting\ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('email-verify-' . $this->username);
    }

    public function broadcastWith(): array
    {
        return [
            'username' => $this->username
        ];
    }

    public function broadcastAs(): string
    {
        return 'verify.email';
    }
}
