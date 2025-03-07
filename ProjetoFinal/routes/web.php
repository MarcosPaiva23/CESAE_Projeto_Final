<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    return view('layout.layout_marcos');
});

Route::get('/dashboard-passageiro', [DashboardController::class, 'showConductorTable'])->name('showconductorTable');
