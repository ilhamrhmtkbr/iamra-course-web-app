<?php

use Domain\Member\Actions\CourseLikeUpdateAction;
use Domain\Member\Actions\EmailSendAction;
use Domain\Member\Actions\EmailVerifyAction;
use Domain\Member\Actions\InstructorUpdateCreateAction;
use Domain\Member\Actions\StudentUpdateCreateAction;
use Domain\Member\Actions\UpdateAdditionalAction;
use Domain\Member\Actions\UpdateAuthenticationAction;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.jwt.cookie')->group(function () {
    Route::patch('course-like', CourseLikeUpdateAction::class);
    Route::post('email', EmailSendAction::class);
    Route::post('instructor', InstructorUpdateCreateAction::class);
    Route::post('student', StudentUpdateCreateAction::class);
    Route::patch('additional-info', UpdateAdditionalAction::class);
    Route::patch('authentication', UpdateAuthenticationAction::class);
});

Route::get('email/verify/{id}/{hash}', EmailVerifyAction::class)
    ->middleware('signed')
    ->name('email.verify');
