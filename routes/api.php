<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/mahasiswa', [MahasiswaController::class, 'apiIndex']);
Route::post('/mahasiswa', [MahasiswaController::class, 'apiStore']);
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'apiDestroy']);
