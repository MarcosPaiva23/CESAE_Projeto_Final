<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDriverController;




Route::get('/admin', [AdminController::class, 'index'])->name('admin_dashboard');//->middleware(['auth', 'admin']);

Route::get('/create-admin', [AdminController::class, 'create'])->name('admin.create');//->middleware(['auth', 'admin'])

Route::post('/store-admin', [AdminController::class, 'store'])->name('admin.store');

Route::get('/', [HomeController::class, 'index']) -> name('home');

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');
// Route::get('feedback', [FeedbackController::class, 'index']) -> name('feedback')->middleware('auth');

Route::get('about', [AboutController::class, 'index']) -> name('about');

Route::get('/dashboard-passageiro', [DashboardDriverController::class, 'showDriverTable'])->name('showDriverTable');

Route::get('/dashboard-condutor', [DashboardController::class, 'showPassengerTable'])->name('showPassengerTable');

//rotas para autenticação e registro
Route::get('/register', [UserController::class, 'viewRegister'] )->name('register');

Route::post('/create-users', [UserController::class, 'createUser'] )->name('users.create');

//route for user email verification
Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verifyUserEmail'])->name('verification.verify');

//route for the user ask for a new email verification link
//Route::get('/email-verification-expired', [UserController::class, 'expiredVerification'] )->name('verification.expired');

Route::POST('/email/resend', [UserController::class, 'verifyUserEmailResend'])->name('verification.resend');



