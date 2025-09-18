<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;

Route::get('/', [SuratController::class, 'index'])->name('arsip.index');
Route::resource('arsip', SuratController::class)->except(['index']);
Route::get('arsip/{arsip}/download', [SuratController::class, 'download'])->name('arsip.download');

Route::resource('kategori', KategoriController::class);

Route::view('about', 'about')->name('about');
