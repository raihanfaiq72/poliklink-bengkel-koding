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
}
