<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paket', [PaketController::class, 'index']);
Route::get('/pelanggaran', [PelanggaranController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index']);
