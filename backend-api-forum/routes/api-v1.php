<?php

use App\Actions\{ForumGetAction, ForumShowAction, ForumStoreAction};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

Route::get('/data', ForumGetAction::class);
Route::get('/data/show', ForumShowAction::class);
Route::post('/data', ForumStoreAction::class);

Route::post('/broadcasting/auth', function (Request $request) {
    try {
        return Broadcast::auth($request);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal server error'], 500);
    }
});
