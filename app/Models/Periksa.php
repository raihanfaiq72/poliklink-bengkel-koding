<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    protected $table = 'periksas';
    protected $guarded = ['id'];
    
    public function daftarPoli()
    {
        return $this->belongsTo(DaftarPoli::class,'id_daftar_poli','id');
    }
}
