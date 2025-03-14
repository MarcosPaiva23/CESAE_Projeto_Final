<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    return view('layout.layout_marcos');
});

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

