<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelanggaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paket', [PaketController::class, 'index']);
Route::get('/pelanggaran', [PelanggaranController::class, 'index']);
