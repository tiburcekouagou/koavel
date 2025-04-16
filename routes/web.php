<?php

use App\Controllers\HomeController;
use Core\Facades\Log;
use Core\Facades\Mail;
use Core\Facades\Route;

Route::get('/', fn () => 'Hello from your Koavel');
Route::get('/home', [HomeController::class, 'index']);
Route::get("/log", function () {
    Log::info("Good Luck in your Way !");
});
Route::get("/send-mail", function () {
    echo Mail::send("johndoe@example.com", "Hi John Doe !");
});