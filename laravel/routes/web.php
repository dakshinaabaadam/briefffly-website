<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/v1', [SiteController::class, 'homeV1'])->name('home.v1');

Route::get('Briefffly Site v2.dc.html', [SiteController::class, 'brieffflySiteV2']);
Route::get('Briefffly Site.dc.html', [SiteController::class, 'brieffflySite']);

Route::get('/api', [ContactController::class, 'home']);
Route::post('send-email', [ContactController::class, 'sendEmail']);
Route::post('send-auto-reply', [ContactController::class, 'sendAutoReply']);
