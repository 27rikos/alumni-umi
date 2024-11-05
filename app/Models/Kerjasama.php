<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    protected $guarded = [];

    public function kerjasama()
    {
        return $this->belongsTo(JenisKerjasama::class, 'jenis_kerjasama');
    }
}