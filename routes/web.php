<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/loginWeb', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

