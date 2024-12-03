<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = "prodis";

    protected $fillable = [
        'kd_prodi',
        'prodi',
    ];

    public function alumni()
    {
        return $this->hasMany(Alumni::class);
    }
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
