<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

// Laravel otomatis akan:
// 1. Resolve dependency injection
// 2. Instantiate object
// 3. Call __invoke() method

// reverb jwt auth
Route::post('/broadcasting/auth', function (Request $request) {
    try {
        return Broadcast::auth($request);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal server error'], 500);
    }
})->middleware(['auth.jwt.cookie']);
