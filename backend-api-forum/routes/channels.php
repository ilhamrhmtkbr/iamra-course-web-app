<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('forum-{id}', function ($user, $id) {
    return [
        'id' => $user->username,
        'name' => $user->full_name,
    ];
});

