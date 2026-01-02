<?php

use Domain\Progresses\Actions\ProgressGetAction;
use Domain\Progresses\Actions\ProgressShowAction;
use Domain\Progresses\Actions\ProgressStoreAction;
use Illuminate\Support\Facades\Route;

Route::get('/', ProgressGetAction::class);
Route::get('show', ProgressShowAction::class);
Route::post('/', ProgressStoreAction::class);
