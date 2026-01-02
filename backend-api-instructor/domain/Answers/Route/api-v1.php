<?php

use Domain\Answers\Actions\AnswerGetAction;
use Domain\Answers\Actions\AnswerStoreAction;
use Domain\Answers\Actions\AnswerUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('answers', AnswerGetAction::class);
Route::post('answers', AnswerStoreAction::class);
Route::patch('answers', AnswerUpdateAction::class);
