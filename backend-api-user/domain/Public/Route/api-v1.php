<?php

use Domain\Public\Action\DownloadInstructorResumeAction;
use Illuminate\Support\Facades\Route;

Route::get('instructor/download-resume', DownloadInstructorResumeAction::class);
