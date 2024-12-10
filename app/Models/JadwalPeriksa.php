<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    protected $table = 'jadwal_periksas';
    protected $guarded = ['id'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'id_dokter','id');
    }
}
