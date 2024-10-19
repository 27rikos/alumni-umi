<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumnis';

    // protected $fillable = [
    //     // 'npm',
    //     // 'nama',
    //     // 'stambuk',
    //     // 'peminatan_id',
    //     // 'prodi_id',
    //     // 'thn_lulus',
    //     'sempro',
    //     'semhas',
    //     'mejahijau',
    //     'yudisium',
    //     // 'judul',
    //     // 'file',
    //     // 'pekerjaan',
    //     // 'status',
    //     // 'falkutas',
    //     // 'no_alumni',
    //     // 'ayah',
    //     // 'ibu',
    //     // 'ipk',
    //     // 'alamat',
    //     // 'tempat_lhr',
    //     // 'tanggal_lhr',

    //     'npm',
    //     'nama',
    //     'peminatan_id',
    //     'prodi_id',
    // ];
    protected $guarded = [];

    public function minat()
    {
        return $this->belongsTo(Peminatan::class, 'peminatan');
    }
    public function prodis()
    {
        return $this->belongsTo(Prodi::class, 'prodi');
    }
    public function dosenpenguji1()
    {
        return $this->belongsTo(Dosen::class, 'penguji1'); // 'penguji1' is the foreign key in 'alumnis'
    }
    public function dosenpenguji2()
    {
        return $this->belongsTo(Dosen::class, 'penguji2'); // 'penguji2' is the foreign key in 'alumnis'
    }
}