<?php

use Domain\Socials\Actions\SocialDeleteAction;
use Domain\Socials\Actions\SocialGetAction;
use Domain\Socials\Actions\SocialStoreAction;
use Domain\Socials\Actions\SocialUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('socials', SocialGetAction::class);
Route::post('socials', SocialStoreAction::class);
Route::patch('socials', SocialUpdateAction::class);
Route::delete('socials', SocialDeleteAction::class);
