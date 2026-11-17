<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Public
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated (Bearer token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/mahasiswa', [MahasiswaController::class, 'apiIndex']);
    Route::post('/mahasiswa', [MahasiswaController::class, 'apiStore']);
    Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'apiDestroy']);

    // TODO: uncomment once App\Http\Controllers\JadwalController exists.
    // Route::apiResource('jadwal', \App\Http\Controllers\JadwalController::class);
});

// Admin only
Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    // TODO: uncomment once App\Http\Controllers\AdminController exists.
    // Route::get('/summary', [\App\Http\Controllers\AdminController::class, 'summary']);
    // Route::delete('/jadwal/{jadwal}', [\App\Http\Controllers\AdminController::class, 'destroy']);
});
