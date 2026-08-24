<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomikController;
use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;





Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Route Kategori yang membutuhkkan autentikasi untuk admin
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

    // Route Komik yang membutuhkkan autentikasi untuk admin
    Route::post('/komik', [KomikController::class, 'store']);
    Route::put('/komik/{id}', [KomikController::class, 'update']);
    Route::delete('/komik/{id}', [KomikController::class, 'destroy']);

    // Pendefinisian kontroller untuk resource "peminjaman" menggunakan route API.
    Route::post('/peminjaman', [PeminjamanController::class, 'store']);
});




// Pendefinisian kontroller untuk resource "kategori" menggunakan route API.
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);


// Pendefinisian kontroller untuk resource "komik" menggunakan route API.
Route::get('/komik', [KomikController::class, 'index']);
Route::get('/komik/{id}', [KomikController::class, 'show']);

// Pendefinisian kontroller untuk resource "anggota" menggunakan route API.
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::post('/anggota', [AnggotaController::class, 'store']);
Route::get('/anggota/{id}', [AnggotaController::class, 'show']);
Route::put('/anggota/{id}', [AnggotaController::class, 'update']);
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy']);