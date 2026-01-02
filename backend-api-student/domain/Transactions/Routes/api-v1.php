<?php

use Domain\Transactions\Actions\TransactionCallbackAction;
use Domain\Transactions\Actions\TransactionCancelAction;
use Domain\Transactions\Actions\TransactionCheckCouponAction;
use Domain\Transactions\Actions\TransactionGetAction;
use Domain\Transactions\Actions\TransactionShowAction;
use Domain\Transactions\Actions\TransactionStoreAction;
use Domain\Transactions\Actions\TransactionUpdateAction;
use Illuminate\Support\Facades\Route;

Route::middleware(\App\Http\Middleware\JwtMiddleware::class)
    ->group(function () {
        Route::get('/', TransactionGetAction::class);
        Route::get('show', TransactionShowAction::class);
        Route::post('/', TransactionStoreAction::class);
        Route::delete('/', TransactionCancelAction::class);
        Route::post('check-coupon', TransactionCheckCouponAction::class);
    });
Route::post('/callback', TransactionUpdateAction::class);
