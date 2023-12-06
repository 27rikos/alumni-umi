<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminatan extends Model
{
    use HasFactory;

    protected $table = "peminatans";

    protected $fillable = [
        "kd_peminatan",
        "peminatan",

    ];
    public function alumni()
    {
        return $this->hasMany(Alumni::class);
    }
}