<?php

use Domain\Certificates\Actions\CertificateDownloadAction;
use Domain\Certificates\Actions\CertificateGetAction;
use Domain\Certificates\Actions\CertificateLinkAction;
use Domain\Certificates\Actions\CertificateShowAction;
use Domain\Certificates\Actions\CertificateStoreAction;
use Illuminate\Support\Facades\Route;

Route::get('/', CertificateGetAction::class);
Route::get('show', CertificateShowAction::class);
Route::get('link', CertificateLinkAction::class);
Route::get('download', CertificateDownloadAction::class);
Route::post('/', CertificateStoreAction::class);
