<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApartemenController;
use App\Http\Controllers\PenghuniController;

Route::get('/', [HomeController::class, 'index'])->name('home');
    
Route::resource('apartemen', ApartemenController::class);
Route::resource('penghuni', PenghuniController::class);
