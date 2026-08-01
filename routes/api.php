<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomikController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Pendefinisian kontroller untuk resource "kategori" menggunakan route API.
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

// Pendefinisian kontroller untuk resource "komik" menggunakan route API.
Route::get('/komik', [KomikController::class, 'index']);
Route::post('/komik', [KomikController::class, 'store']);
Route::get('/komik/{id}', [KomikController::class, 'show']);
Route::put('/komik/{id}', [KomikController::class, 'update']);
Route::delete('/komik/{id}', [KomikController::class, 'destroy']);

// Pendefinisian kontroller untuk resource "anggota" menggunakan route API.`
Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'index']);
Route::post('/anggota', [App\Http\Controllers\AnggotaController::class, 'store']);
Route::get('/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'show']);
Route::put('/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'update']);
Route::delete('/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'destroy']);