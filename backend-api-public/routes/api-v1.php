<?php

use Illuminate\Support\Facades\Route;

Route::get('courses', \App\Actions\CourseGetAction::class);
Route::get('course', \App\Actions\CourseShowAction::class);
Route::get('section', \App\Actions\SectionGetAction::class);
Route::get('student/certificate/verify', \App\Actions\CertificateVerifyAction::class);
