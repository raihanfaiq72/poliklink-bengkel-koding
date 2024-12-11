<?php

use App\Http\Controllers\AdminWell;
use App\Http\Controllers\DokterWell;
use App\Http\Controllers\PasienWell;
use Illuminate\Support\Facades\Route;

Route::controller(PasienWell::class)->group(function(){
    Route::get('/','login')->name('login.pasien');
    Route::post('login','login_proses')->name('login.proses.pasien');
    Route::get('register','register')->name('register.pasien');
    Route::post('register','register_proses')->name('register.proses.pasien');
    Route::get('logout','logout')->name('logout');

    Route::middleware(['pasien','login'])->group(function(){
        Route::get('pasien/dashboard','dashboard')->name('pasien.dashboard');
        Route::get('pasien/poli','poli')->name('pasien.poli');
        Route::get('pasien/poli/{id}','poli_id_poli')->name('pasien.poli.get_poli');
        // Route::get('pasien/poli/{id}/')
        Route::get('pasien/riwayat-poli','riwayat_poli')->name('pasien.poli.riwayat');
    });
});

Route::controller(DokterWell::class)->group(function(){
    Route::get('dokter/login','login')->name('login.dokter');
    Route::post('dokter/login','login_proses')->name('login.proses.dokter');

    Route::middleware(['dokter','login'])->group(function(){
        Route::get('dokter/dashboard','dashboard')->name('dokter.dashboard');
        
        Route::get('dokter/jadwal-periksa','jadwal_periksa')->name('dokter.jadwal-periksa');
        Route::post('dokter/jadwal-periksa','jadwal_periksa_post')->name('dokter.jadwal-periksa.post');
        Route::get('dokter/jadwal-periksa/{id}/edit','jadwal_periksa_edit')->name('dokter.jadwal-periksa.edit');
        Route::put('dokter/jadwal-periksa/{id}','jadwal_periksa_update')->name('dokter.jadwal-periksa.update');
        Route::post('dokter/jadwal-periksa/{id}/delete','jadwal_periksa_delete')->name('dokter.jadwal-periksa.delete');

        Route::get('dokter/periksa-pasien','periksa_pasien_index')->name('dokter.periksa-pasien');
        Route::get('dokter/periksa-pasien/{id}/edit','periksa_pasien_edit')->name('dokter.periksa-pasien.edit');
        Route::put('dokter/periksa-pasien/{id}','periksa_pasien_update')->name('dokter.periksa-pasien.update');
        Route::get('dokter/periksa-pasien/periksa/{id}','periksa_pasien_periksa')->name('dokter.periksa-pasien.periksa');
        Route::put('dokter/periksa-pasien/periksa/{id}','periksa_pasien_periksa_update')->name('dokter.periksa-pasien.periksa-update');

        Route::get('dokter/riwayat-pasien','riwayat_pasien')->name('dokter.riwayat-pasien');

        Route::get('dokter/profile','profile')->name('dokter.profile');
        Route::post('dokter/profile','profile_update')->name('dokter.profile.update');
    });
});

Route::controller(AdminWell::class)->group(function(){ 
    Route::get('admin/login','login')->name('login.admin');
    Route::post('admin/login','login_proses')->name('login.proses.admin');

    Route::middleware(['admin','login'])->group(function(){
        Route::get('admin/dashboard','dashboard')->name('dashboard');
        Route::get('admin/logout','logout')->name('logout.admin');
        
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

        Route::get('admin/pasien','pasien')->name('pasien');
        Route::post('admin/pasien','pasien_post')->name('pasien-post');
        Route::get('admin/pasien/{id}','pasien_edit')->name('pasien-edit');
        Route::put('admin/pasien/{id}','pasien_update')->name('pasien-update');
        Route::post('admin/pasien/{id}/delete','pasien_delete')->name('pasien-delete');
    });
});
 