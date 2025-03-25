<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
use App\Http\Controllers\UserController;

=======
>>>>>>> Stashed changes
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;

<<<<<<< Updated upstream
=======
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDriverController;


>>>>>>> Stashed changes


Route::get('/admin', [AdminController::class, 'index'])->name('admin_dashboard');//->middleware(['auth', 'admin']);



Route::get('/', [HomeController::class, 'index']) -> name('home');

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');
// Route::get('feedback', [FeedbackController::class, 'index']) -> name('feedback')->middleware('auth');

Route::get('about', [AboutController::class, 'index']) -> name('about');
<<<<<<< Updated upstream
Route::get('/dashboard-passageiro', [DashboardController::class, 'showDriverTable'])->name('showDriverTable');
=======

Route::get('/dashboard-passageiro', [DashboardDriverController::class, 'showDriverTable'])->name('showDriverTable');
>>>>>>> Stashed changes

Route::get('/dashboard-condutor', [DashboardController::class, 'showPassengerTable'])->name('showPassengerTable');
//rotas para autenticação e registro
Route::get('/register', [UserController::class, 'viewRegister'] )->name('register');

Route::post('/create-users', [UserController::class, 'createUser'] )->name('users.create');

//route for user email verification
Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verifyUserEmail'])->name('verification.verify');

//route for the user ask for a new email verification link
//Route::get('/email-verification-expired', [UserController::class, 'expiredVerification'] )->name('verification.expired');

Route::POST('/email/resend', [UserController::class, 'verifyUserEmailResend'])->name('verification.resend');
<<<<<<< Updated upstream
=======



>>>>>>> Stashed changes
