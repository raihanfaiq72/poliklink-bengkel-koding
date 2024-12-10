<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokters';
    protected $guarded = ['id'];

    public function poli()
    {
        return $this->belongsTo(Poli::class,'id_poli','id');
    }
}
