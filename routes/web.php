<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('pelaporan.create'));

// WARGA (tanpa login): kirim laporan
Route::get('/lapor', [PelaporanController::class, 'create'])->name('pelaporan.create');
Route::post('/lapor', [PelaporanController::class, 'store'])->name('pelaporan.store');

// PUBLIK: lihat daftar & detail laporan (hanya baca)
Route::resource('laporan', LaporanController::class)->only(['index', 'show']);

// LOGIN & REGISTRASI PETUGAS
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.attempt');

    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

// PETUGAS (harus login): ubah & hapus laporan
Route::middleware('auth')->group(function () {
    Route::resource('laporan', LaporanController::class)->only(['edit', 'update', 'destroy']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
