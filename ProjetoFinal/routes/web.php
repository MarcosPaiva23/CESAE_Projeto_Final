<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FeedbackController;

use App\Http\Controllers\UserController;


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

Route::get('/dashboard-passageiro', [DashboardController::class, 'showDriverTable'])->name('showDriverTable');

Route::get('/dashboard-condutor', [DashboardController::class, 'showPassengerTable'])->name('showPassengerTable');

//rotas para autenticação e registro
Route::get('/register', [UserController::class, 'viewRegister'] )->name('register');

Route::post('/create-users', [UserController::class, 'createUser'] )->name('users.create');

//route for user email verification
Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verifyUserEmail'])->name('verification.verify');

//route for the user ask for a new email verification link
//Route::get('/email-verification-expired', [UserController::class, 'expiredVerification'] )->name('verification.expired');

Route::POST('/email/resend', [UserController::class, 'verifyUserEmailResend'])->name('verification.resend');


