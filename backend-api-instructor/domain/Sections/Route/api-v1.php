<?php

use Domain\Sections\Actions\SectionDeleteAction;
use Domain\Sections\Actions\SectionGetAction;
use Domain\Sections\Actions\SectionStoreAction;
use Domain\Sections\Actions\SectionUpdateAction;
use Illuminate\Support\Facades\Route;

Route::get('sections', SectionGetAction::class);
Route::post('sections', SectionStoreAction::class);
Route::patch('sections', SectionUpdateAction::class);
Route::delete('sections', SectionDeleteAction::class);
