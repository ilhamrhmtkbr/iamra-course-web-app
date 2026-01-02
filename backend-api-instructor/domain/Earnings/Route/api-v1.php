<?php

use Domain\Earnings\Actions\EarningGetAction;
use Domain\Earnings\Actions\EarningPayoutAction;
use Illuminate\Support\Facades\Route;

Route::get('earnings', EarningGetAction::class);
Route::post('earnings', EarningPayoutAction::class);
