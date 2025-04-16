<?php

use App\Controllers\HomeController;
use Core\Facades\Route;

Route::get('/', fn () => 'Hello from your Koavel');
Route::get('/home', [HomeController::class, 'index']);