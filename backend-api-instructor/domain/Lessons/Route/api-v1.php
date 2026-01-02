<?php

use Domain\Lessons\Actions\LessonDeleteAction;
use Domain\Lessons\Actions\LessonGetAction;
use Domain\Lessons\Actions\LessonStoreAction;
use Domain\Lessons\Actions\LessonUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('lessons', LessonGetAction::class);
Route::post('lessons', LessonStoreAction::class);
Route::patch('lessons', LessonUpdateAction::class);
Route::delete('lessons', LessonDeleteAction::class);
