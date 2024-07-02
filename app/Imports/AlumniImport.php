<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\Peminatan;
use App\Models\Prodi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumniImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $peminatan_id = Peminatan::where('peminatan', $row['peminatan'])->first();
            $prodi_id = Prodi::where('prodi', $row['prodi'])->first();
            if ($peminatan_id && $prodi_id != null) {
                Alumni::create([
                    'nama' => $row['nama'],
                    'no_alumni' => $row['no_alumni'],
                    'npm' => $row['npm'],
                    'stambuk' => $row['stambuk'],
                    'thn_lulus' => $row['thn_lulus'],
                    'peminatan' => $peminatan_id['id'],
                    'prodi' => $prodi_id['id'],
                ]);
            }
        }

    }
}
