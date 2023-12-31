<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';

    protected $fillable = [
        'npm',
        'nama',
        'stambuk',
        'peminatan',
        'prodi',
        'thn_lulus',
        'sempro',
        'semhas',
        'mejahijau',
        'yudisium',
        'judul',
        'file',
        'status',
    ];

    public function minat()
    {
        return $this->belongsTo(Peminatan::class, 'peminatan');
    }
    public function prodis()
    {
        return $this->belongsTo(Prodi::class, 'prodi');
    }
}
