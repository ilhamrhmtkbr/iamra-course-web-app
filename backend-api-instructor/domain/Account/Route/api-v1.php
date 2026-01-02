<?php

use Domain\Account\Actions\AccountShowAction;
use Domain\Account\Actions\AccountStoreAction;
use Domain\Account\Actions\AccountUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('account', AccountShowAction::class);
Route::post('account', AccountStoreAction::class);
Route::patch('account', AccountUpdateAction::class);
