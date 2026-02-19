<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailPreviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mail-preview', [MailPreviewController::class, 'preview']);
