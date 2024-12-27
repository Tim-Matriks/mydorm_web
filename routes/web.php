<?php

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\DormitizenController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paket', [PaketController::class, 'index']);
Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/kamar/{id}', [KamarController::class, 'detail']);
Route::get('/pelanggaran', [PelanggaranController::class, 'index']);

// semua route berkaitan logs
Route::get('/logs', [LogController::class, 'index'])->name('logskeluarmasuk.index');
Route::get('/logs/tambah', [LogController::class, 'create'])->name('logskeluarmasuk.create');
Route::post('/logs/store', [LogController::class, 'store'])->name('logskeluarmasuk.store');
Route::delete('/logs/{id}', [LogController::class, 'destroy'])->name('logskeluarmasuk.destroy');
Route::get('/logs/edit/{id}', [LogController::class, 'edit'])->name('logskeluarmasuk.edit');
Route::put('/logs/update/{id}', [LogController::class, 'update'])->name('logskeluarmasuk.update');
Route::get('logs/search-dormitizen', [LogController::class, 'searchDormitizen'])->name('logskeluarmasuk.searchDormitizen');

// Routes for Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

Route::get('/dormitizen', [DormitizenController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
