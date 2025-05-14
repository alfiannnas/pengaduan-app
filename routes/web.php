<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Registration
Route::get('/registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::post('/registration', [AuthController::class, 'register']);

// Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/data-pengaduan', [AdminController::class, 'dataPengaduan'])->name('admin.data-pengaduan');
    Route::get('/data-tanggapan', [AdminController::class, 'dataTanggapan'])->name('admin.data-tanggapan');
    Route::get('/data-petugas', [AdminController::class, 'dataPetugas'])->name('admin.data-petugas');
    Route::get('/data-masyarakat', [AdminController::class, 'dataMasyarakat'])->name('admin.data-masyarakat');
});
