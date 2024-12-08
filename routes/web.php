<?php

use App\Http\Controllers\Admin\AdminWell;
use App\Http\Controllers\Dokter\DokterWell;
use App\Http\Controllers\Pasien\PasienWell;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::middleware(['auth','verified'])->group(function(){
    Route::controller(AdminWell::class)->group(function(){
        Route::get('admin/dashboard','dashboard')->name('dashboard');
        Route::get('admin/poli','poli')->name('poli');
        Route::post('admin/poli','poli_post')->name('poli-post');
    });
});

// dokter
Route::middleware(['auth','dokter'])->group(function(){
    Route::controller(DokterWell::class)->group(function(){
        Route::get('dokter/dashboard','dashboard')->name('dokter-dashboard');
    });
});

// pasien
Route::middleware(['auth','pasien'])->group(function(){
    Route::controller(PasienWell::class)->group(function(){
        Route::get('pasien/dashboard','dashboard')->name('pasien-dashboard');
    });
});
require __DIR__.'/auth.php';
