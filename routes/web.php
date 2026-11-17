<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatkulController;

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');

Route::get('/tambah-mahasiswa', [MahasiswaController::class, 'create'])
    ->name('mahasiswa.create');

Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
    ->name('mahasiswa.store');

Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])
    ->name('mahasiswa.destroy');

// Dosen
Route::get('/dosen', [DosenController::class, 'index'])
    ->name('dosen.index');

// Mata Kuliah
Route::get('/matakuliah', [MatkulController::class, 'index'])
    ->name('matakuliah.index');
