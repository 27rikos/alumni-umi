<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $guarded = [];

    public function prodi_mahasiswa()
    {
        return $this->belongsTo(Prodi::class, 'prodi');
    }
}
