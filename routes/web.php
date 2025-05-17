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
    Route::delete('/profil-desa/{id}', [AdminController::class, 'deleteProfilDesa'])->name('admin.profil-desa.delete');
    Route::post('/profil-desa', [AdminController::class, 'storeProfilDesa'])->name('admin.profil-desa.store');
    Route::post('/profil-desa/update', [AdminController::class, 'updateProfilDesa'])->name('admin.profil-desa.update');
});

Route::get('/', [MasyarakatController::class, 'home'])->name('home');
Route::get('/home', [MasyarakatController::class, 'home'])->name('home');
Route::get('/sejarah-desa', [MasyarakatController::class, 'sejarahDesa'])->name('sejarah-desa');
Route::get('/struktur-organisasi', [MasyarakatController::class, 'strukturOrganisasi'])->name('struktur-organisasi');
Route::get('/visi-misi', [MasyarakatController::class, 'visiMisi'])->name('visi-misi');
Route::get('/lokasi', [MasyarakatController::class, 'lokasi'])->name('lokasi');
Route::get('/kontak', [MasyarakatController::class, 'kontak'])->name('kontak');

Route::middleware('auth')->group(function () {
    Route::get('/pengaduan-bantuan-sosial', [MasyarakatController::class, 'pengaduanBantuanSosial'])->name('pengaduan-bantuan-sosial');
    Route::post('/pengaduan-bantuan-sosial', [MasyarakatController::class, 'storePengaduanBantuanSosial'])->name('pengaduan-bantuan-sosial.store');

    Route::get('/pengaduan-lingkungan', [MasyarakatController::class, 'pengaduanLingkungan'])->name('pengaduan-lingkungan');
    Route::post('/pengaduan-lingkungan', [MasyarakatController::class, 'storePengaduanLingkungan'])->name('pengaduan-lingkungan.store');

    Route::get('/kesalahan-penulisan-data', [MasyarakatController::class, 'kesalahanPenulisanData'])->name('kesalahan-penulisan-data');
    Route::post('/kesalahan-penulisan-data', [MasyarakatController::class, 'storeKesalahanPenulisanData'])->name('kesalahan-penulisan-data.store');

    Route::get('/permasalahan-dokumen', [MasyarakatController::class, 'permasalahanDokumen'])->name('permasalahan-dokumen');
    Route::post('/permasalahan-dokumen', [MasyarakatController::class, 'storePermasalahanDokumen'])->name('permasalahan-dokumen.store');

    Route::get('/keterlambatan-proses', [MasyarakatController::class, 'keterlambatanProses'])->name('keterlambatan-proses');
    Route::post('/keterlambatan-proses', [MasyarakatController::class, 'storeKeterlambatanProses'])->name('keterlambatan-proses.store');

    Route::get('/pelayanan-tidak-sesuai', [MasyarakatController::class, 'pelayananTidakSesuai'])->name('pelayanan-tidak-sesuai');
    Route::post('/pelayanan-tidak-sesuai', [MasyarakatController::class, 'storePelayananTidakSesuai'])->name('pelayanan-tidak-sesuai.store');

    Route::get('/pengaduan-keamanan', [MasyarakatController::class, 'pengaduanKeamanan'])->name('pengaduan-keamanan');
    Route::post('/pengaduan-keamanan', [MasyarakatController::class, 'storePengaduanKeamanan'])->name('pengaduan-keamanan.store');

    Route::get('/status-pengaduan', [MasyarakatController::class, 'statusPengaduan'])->name('status-pengaduan');
    Route::delete('/status-pengaduan/{id}', [MasyarakatController::class, 'deletePengaduan'])->name('status-pengaduan.delete');
    Route::get('/status-pengaduan/{id}', [MasyarakatController::class, 'statusPengaduanDetail'])->name('status-pengaduan.detail');

    Route::get('/profile', [MasyarakatController::class, 'profile'])->name('profile');
    Route::get('/edit-profile', [MasyarakatController::class, 'editProfile'])->name('edit-profile');
    Route::post('/store-profile', [MasyarakatController::class, 'storeProfile'])->name('store-profile');
});
