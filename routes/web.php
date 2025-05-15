<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasyarakatController;

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Registration
Route::get('/registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::post('/registration', [AuthController::class, 'register']);

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete('/data-pengaduan/{id}', [AdminController::class, 'deletePengaduan'])->name('admin.delete-pengaduan');
    Route::delete('/data-tanggapan/{id}', [AdminController::class, 'deleteTanggapan'])->name('admin.delete-tanggapan');
    Route::get('/data-pengaduan', [AdminController::class, 'dataPengaduan'])->name('admin.data-pengaduan');
    Route::get('/data-tanggapan', [AdminController::class, 'dataTanggapan'])->name('admin.data-tanggapan');

    Route::delete('/data-petugas/{id}', [AdminController::class, 'deletePetugas'])->name('admin.delete-petugas');
    Route::get('/data-petugas', [AdminController::class, 'dataPetugas'])->name('admin.data-petugas');
    Route::get('/data-petugas/create', [AdminController::class, 'createPetugas'])->name('admin.create-petugas');
    Route::post('/data-petugas', [AdminController::class, 'storePetugas'])->name('admin.store-petugas');
    
    Route::post('/data-masyarakat', [AdminController::class, 'storeMasyarakat'])->name('admin.store-masyarakat');
    Route::delete('/data-masyarakat/{id}', [AdminController::class, 'deleteMasyarakat'])->name('admin.delete-masyarakat');
    Route::get('/data-masyarakat', [AdminController::class, 'dataMasyarakat'])->name('admin.data-masyarakat');

    Route::post('/export-pengaduan', [AdminController::class, 'exportPengaduan'])->name('admin.export-pengaduan');
    Route::post('/export-tanggapan', [AdminController::class, 'exportTanggapan'])->name('admin.export-tanggapan');
    Route::post('/verifikasi-pengaduan', [AdminController::class, 'verifikasiPengaduan'])->name('admin.verifikasi-pengaduan');
    Route::post('/tanggapi-pengaduan', [AdminController::class, 'tanggapiPengaduan'])->name('admin.tanggapi-pengaduan');
    Route::get('/profil-desa', [AdminController::class, 'profilDesa'])->name('admin.profil-desa');
});

Route::get('/home', [MasyarakatController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/pengaduan-bantuan-sosial', [MasyarakatController::class, 'pengaduanBantuanSosial'])->name('pengaduan-bantuan-sosial');
    Route::post('/pengaduan-bantuan-sosial', [MasyarakatController::class, 'storePengaduanBantuanSosial'])->name('pengaduan-bantuan-sosial.store');
});
