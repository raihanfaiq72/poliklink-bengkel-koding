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
        Route::get('admin/poli/{id}','poli_edit')->name('poli-edit');
        Route::put('admin/poli/{id}','poli_update')->name('poli-update');
        Route::post('admin/poli/{id}/delete','poli_delete')->name('poli-delete');
        
        Route::get('admin/dokter','dokter')->name('dokter');
        Route::post('admin/dokter','dokter_post')->name('dokter-post');
        Route::get('admin/dokter/{id}','dokter_edit')->name('dokter-edit');
        Route::put('admin/dokter/{id}','dokter_update')->name('dokter-update');
        Route::post('admin/dokter/{id}/delete','dokter_delete')->name('dokter-delete');

        Route::get('admin/obat','obat')->name('obat');
        Route::post('admin/obat','obat_post')->name('obat-post');
        Route::get('admin/obat/{id}','obat_edit')->name('obat-edit');
        Route::put('admin/obat/{id}','obat_update')->name('obat-update');
        Route::post('admin/obat/{id}/delete','obat_delete')->name('obat-delete');
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
