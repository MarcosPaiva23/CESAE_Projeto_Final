<?php

use App\Http\Middleware\Suspended;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AboutController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDriverController;

use App\Http\Controllers\SettingsController;


Route::get('/admin', [AdminController::class, 'index'])->name('admin_dashboard')->middleware(['auth', AdminMiddleware::class]);
Route::get('/admin/delete/{id}', [AdminController::class, 'blockUserAccess'])->name('blockUserAccess') -> middleware(Suspended::class);

Route::get('/', [HomeController::class, 'index']) -> name('home');

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback') -> middleware(['auth', Suspended::class]);
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store') -> middleware(['auth', Suspended::class]);

Route::get('/admin', [AdminController::class, 'index'])->name('admin_dashboard');//->middleware(['auth', 'admin']);

Route::get('/create-admin', [AdminController::class, 'create'])->name('admin.create');//->middleware(['auth', 'admin'])

Route::post('/store-admin', [AdminController::class, 'store'])->name('admin.store');

Route::get('/', [HomeController::class, 'index']) -> name('home');

Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update')->middleware(['auth']);

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('about', [AboutController::class, 'index']) -> name('about');

Route::get('/dashboard-passageiro', [DashboardDriverController::class, 'showDriverTable'])->name('showDriverTable') -> middleware(['auth', Suspended::class]);

Route::get('/dashboard-condutor', [DashboardController::class, 'showPassengerTable'])->name('showPassengerTable') -> middleware(['auth', Suspended::class]);

Route::get('/dashboard-passageiro', [DashboardDriverController::class, 'showDriverTable'])->name('showDriverTable');

Route::get('/dashboard-condutor', [DashboardController::class, 'showPassengerTable'])->name('showPassengerTable');


Route::get('/dashboard-passageiro', [DashboardController::class, 'showDriverTable'])->name('showDriverTable');

Route::get('/dashboard-passageiro', [DashboardDriverController::class, 'showDriverTable'])->name('showDriverTable');

Route::get('/dashboard-condutor', [DashboardController::class, 'showPassengerTable'])->name('showPassengerTable');

//rotas para autenticação e registro
Route::get('/register', [UserController::class, 'viewRegister'] )->name('register') -> middleware(Suspended::class);

Route::post('/create-users', [UserController::class, 'createUser'] )->name('users.create') -> middleware(Suspended::class);

//route for user email verification
Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verifyUserEmail'])->name('verification.verify') -> middleware(Suspended::class);

//route for the user ask for a new email verification link
//Route::get('/email-verification-expired', [UserController::class, 'expiredVerification'] )->name('verification.expired');

Route::POST('/email/resend', [UserController::class, 'verifyUserEmailResend'])->name('verification.resend') -> middleware(Suspended::class);

