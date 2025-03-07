<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    return view('layout.layout_marcos');
});


Route::get('home', [HomeController::class, 'index']) -> name('home');

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');
// Route::get('feedback', [FeedbackController::class, 'index']) -> name('feedback')->middleware('auth');

Route::get('about', [AboutController::class, 'index']) -> name('about');
