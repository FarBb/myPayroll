<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    // merelasikan

    public function divisi()
    {
        return $this->belongsTo('\App\Models\Divisi');
    }
}
