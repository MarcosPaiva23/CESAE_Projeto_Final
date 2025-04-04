<?php

use App\Http\Middleware\Suspended;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AboutController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;

use App\Http\Controllers\SettingsController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDriverController;

Route::get('/', [HomeController::class, 'index']) -> name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin_dashboard')->middleware(['auth', AdminMiddleware::class]);
Route::get('/admin/delete/{id}', [AdminController::class, 'blockUserAccess'])->name('blockUserAccess') -> middleware(Suspended::class);

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback') -> middleware(['auth', Suspended::class]);
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store') -> middleware(['auth', Suspended::class]);

Route::get('/create-admin', [AdminController::class, 'create'])->name('admin.create');//->middleware(['auth', 'admin'])

Route::post('/store-admin', [AdminController::class, 'store'])->name('admin.store');

Route::get('feedback', [FeedbackController::class, 'create'])->name('feedback')->middleware(['auth', Suspended::class]);
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store')->middleware(['auth', Suspended::class]);

// Rotas para administradores (backoffice)
// Lista de todos os feedbacks
Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('back_office.ver_feedback')->middleware(['auth', AdminMiddleware::class]);
// Ver feedback específico
Route::get('/admin/feedback/{id}', [FeedbackController::class, 'show'])->name('back_office.ver_feedback_especifico')->middleware(['auth', AdminMiddleware::class]);
// Eliminar feedback
Route::delete('/admin/feedback/{id}', [FeedbackController::class, 'destroy'])->name('back_office.ver_feedback.delete')->middleware(['auth', AdminMiddleware::class]);

// Configurações
Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update')->middleware(['auth']);
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index')->middleware(['auth']);

// Página Sobre
Route::get('about', [AboutController::class, 'index'])->name('about');


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

