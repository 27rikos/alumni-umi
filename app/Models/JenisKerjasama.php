<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKerjasama extends Model
{
    protected $guarded = [];

    public function kerjasama()
    {
        return $this->hasMany(Kerjasama::class);
    }
}