<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FeedbackController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    return view('layout.layout_marcos');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin_dashboard');//->middleware(['auth', 'admin']);


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
