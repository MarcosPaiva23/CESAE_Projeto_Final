<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    return view('layout.layout_marcos');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin_dashboard');//->middleware(['auth', 'admin']);

