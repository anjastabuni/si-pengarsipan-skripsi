<?php

use App\Http\Controllers\AllSkripsiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SkripsiController;

Route::get('/', function () {
    return view('login');
});
// pencarian
// routes/web.php
// Route::get('/admin/skripsi', [SkripsiController::class, 'index'])->name('admin.skripsi');
// Route::get('/search', [SkripsiController::class, 'search']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    // fakultas
    Route::get('/admin/fakultas', [FakultasController::class, 'index'])->name('admin.fakultas');
    Route::post('/admin/fakultas', [FakultasController::class, 'store'])->name('admin.fakultas.store');
    Route::delete('/admin/fakultas/{fakultas}', [FakultasController::class, 'destroy'])->name('admin.fakultas.destroy');

    // prodi
    Route::get('/admin/prodi', [ProdiController::class, 'index'])->name('admin.prodi');
    Route::post('/admin/prodi', [ProdiController::class, 'store'])->name('admin.prodi.store');
    Route::delete('/admin/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('admin.prodi.destroy');

    // dosen
    Route::get('/admin/dosen', [DosenController::class, 'index'])->name('admin.dosen');
    Route::post('/admin/dosen', [DosenController::class, 'store'])->name('admin.dosen.store');
    Route::delete('/admin/dosen/{dosen}', [DosenController::class, 'destroy'])->name('admin.dosen.destroy');

    // mahasiswa
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
    Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
    Route::delete('/admin/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');

    // skripsi
    Route::get('/admin/skripsi', [SkripsiController::class, 'index'])->name('admin.skripsi');
    Route::post('/admin/skripsi', [SkripsiController::class, 'store'])->name('admin.skripsi.store');
    Route::delete('/admin/skripsi/{skripsi}', [SkripsiController::class, 'destroy'])->name('admin.skripsi.destroy');

    // allskripsi
    Route::get('/admin/skripsi/allskripsi', [AllSkripsiController::class, 'index'])->name('admin.skripsi.allskripsi');
    Route::get('/admin/skripsi/detailskripsi/{id}', [AllSkripsiController::class, 'show'])->name('admin.skripsi.detailskripsi');



    // akun
    Route::get('/admin/akun', [AuthController::class, 'index'])->name('admin.akun');
});
