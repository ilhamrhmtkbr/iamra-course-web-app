<?php

use Domain\Coupons\Actions\CouponDeleteAction;
use Domain\Coupons\Actions\CouponGetAction;
use Domain\Coupons\Actions\CouponShowAction;
use Domain\Coupons\Actions\CouponStoreAction;
use Domain\Coupons\Actions\CouponUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('coupons', CouponGetAction::class);
Route::get('coupons/show', CouponShowAction::class);
Route::post('coupons', CouponStoreAction::class);
Route::patch('coupons', CouponUpdateAction::class);
Route::delete('coupons', CouponDeleteAction::class);
