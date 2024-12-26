<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    protected $table = 'daftar_poli';
    protected $guarded = ['id'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class,'id_pasien','id');
    }

    public function jadwalPeriksa()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    // Relasi dengan periksa (tabel periksas)
    public function periksa()
    {
        return $this->hasOne(Periksa::class, 'id_daftar_poli');
    }
}
