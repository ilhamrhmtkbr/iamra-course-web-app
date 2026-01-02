<?php

use Domain\Courses\Actions\CourseDeleteAction;
use Domain\Courses\Actions\CourseGetAction;
use Domain\Courses\Actions\CourseLikesGetAction;
use Domain\Courses\Actions\CourseReviewsGetAction;
use Domain\Courses\Actions\CourseShowAction;
use Domain\Courses\Actions\CourseStoreAction;
use Domain\Courses\Actions\CourseUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('courses', CourseGetAction::class);
Route::get('courses/show', CourseShowAction::class);
Route::post('courses', CourseStoreAction::class);
Route::patch('courses', CourseUpdateAction::class);
Route::delete('courses', CourseDeleteAction::class);
Route::get('courses/likes', CourseLikesGetAction::class);
Route::get('courses/reviews', CourseReviewsGetAction::class);
