<?php

use Domain\Questions\Actions\QuestionDeleteAction;
use Domain\Questions\Actions\QuestionGetAction;
use Domain\Questions\Actions\QuestionShowAction;
use Domain\Questions\Actions\QuestionStoreAction;
use Domain\Questions\Actions\QuestionUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('/', QuestionGetAction::class);
Route::get('show', QuestionShowAction::class);
Route::post('/', QuestionStoreAction::class);
Route::patch('/', QuestionUpdateAction::class);
Route::delete('/', QuestionDeleteAction::class);
