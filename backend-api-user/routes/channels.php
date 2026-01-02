<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('email-verify-{username}', function ($user, string $username) {
    return $user && $user->username === $username;
});
