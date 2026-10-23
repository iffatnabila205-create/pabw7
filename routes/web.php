<?php

use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/lapor-banjir', [LaporBanjirController::class, 'index'])->name('laporbanjir.form');
Route::post('/lapor-banjir', [LaporBanjirController::class, 'store'])->name('laporbanjir.store');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.attempt');
});

Route::middleware('auth')->group(function () {
    Route::get('/daftar-laporan', [LaporBanjirController::class, 'daftar'])->name('laporbanjir.daftar');
    Route::get('/profil', [LaporBanjirController::class, 'profil'])->name('profil');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});