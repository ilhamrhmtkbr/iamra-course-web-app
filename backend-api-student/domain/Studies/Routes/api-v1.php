<?php

use Domain\Studies\Actions\CoursesGetAction;
use Domain\Studies\Actions\LessonsGetAction;
use Domain\Studies\Actions\SectionsGetAction;
use Illuminate\Support\Facades\Route;

Route::get('courses', CoursesGetAction::class);
Route::get('sections', SectionsGetAction::class);
Route::get('lessons', LessonsGetAction::class);
