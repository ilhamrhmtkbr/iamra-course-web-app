<?php

use Domain\Carts\Actions\CartDeleteAction;
use Domain\Carts\Actions\CartGetAction;
use Domain\Carts\Actions\CartStoreAction;
use Illuminate\Support\Facades\Route;

Route::get('/', CartGetAction::class);
Route::post('/', CartStoreAction::class);
Route::delete('/', CartDeleteAction::class);
