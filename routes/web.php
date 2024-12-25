<?php

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paket', [PaketController::class, 'index']);
Route::get('/pelanggaran', [PelanggaranController::class, 'index']);



// semua route berkaitan logs
Route::get('/logs', [LogController::class, 'index'])->name('logskeluarmasuk.index');
Route::get('/logs/tambah', [LogController::class, 'create'])->name('logskeluarmasuk.create');
Route::post('/logs/store', [LogController::class, 'store'])->name('logskeluarmasuk.store');
Route::delete('/logs/{id}', [LogController::class, 'destroy'])->name('logskeluarmasuk.destroy');
Route::get('/logs/edit/{id}', [LogController::class, 'edit'])->name('logskeluarmasuk.edit');
Route::put('/logs/update/{id}', [LogController::class, 'update'])->name('logskeluarmasuk.update');

Route::get('logs/search-dormitizen', [LogController::class, 'searchDormitizen'])->name('logskeluarmasuk.searchDormitizen');

Route::get('/berita', [BeritaController::class, 'index']);

