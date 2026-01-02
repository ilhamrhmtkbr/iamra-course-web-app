<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ForumsSendEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $username;
    public string $name;
    public string $message;
    public string $created_at;
    public string $role;
    public string $course_id;

    public function __construct(string $username, string $name, string $message, string $created_at, string $role, string $course_id)
    {
        $this->username = $username;
        $this->name = $name;
        $this->message = $message;
        $this->created_at = $created_at;
        $this->role = $role;
        $this->course_id = $course_id;
    }

    public function broadcastOn(): PresenceChannel
    {
        $channelName = 'forum-' . $this->course_id;
        return new PresenceChannel($channelName);
    }

    public function broadcastAs(): string
    {
        return 'forum.sent';
    }

    public function broadcastWith(): array
    {
        $data = [
            'username' => $this->username,
            'name' => $this->name,
            'message' => $this->message,
            'created_at' => $this->created_at,
            'role' => $this->role,
            'course_id' => $this->course_id,
        ];

        return $data;
    }
}
