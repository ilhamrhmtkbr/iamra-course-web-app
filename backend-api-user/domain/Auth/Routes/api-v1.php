<?php

use Domain\Auth\Actions\LoginAction;
use Domain\Auth\Actions\LoginWithGoogleAction;
use Domain\Auth\Actions\LogoutAction;
use Domain\Auth\Actions\MeAction;
use Domain\Auth\Actions\RefreshAction;
use Domain\Auth\Actions\RegisterAction;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterAction::class);
Route::post('login', LoginAction::class);
Route::post('login-with-google', LoginWithGoogleAction::class);

Route::middleware('auth.jwt.cookie')->group(function () {
    Route::get('me', MeAction::class);
    Route::get('logout', LogoutAction::class);
});
Route::get('refresh', RefreshAction::class)
    ->middleware('auth.jwt.cookie-refresh');
