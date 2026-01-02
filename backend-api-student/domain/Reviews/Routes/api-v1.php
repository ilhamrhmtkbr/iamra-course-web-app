<?php

use Domain\Reviews\Actions\ReviewDeleteAction;
use Domain\Reviews\Actions\ReviewGetAction;
use Domain\Reviews\Actions\ReviewStoreAction;
use Domain\Reviews\Actions\ReviewUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('/', ReviewGetAction::class);
Route::post('/', ReviewStoreAction::class);
Route::patch('/', ReviewUpdateAction::class);
Route::delete('/', ReviewDeleteAction::class);
