<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\Peminatan;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumniImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $rows
     *
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $peminatan_id = Peminatan::where('peminatan', $row['peminatan'])->first();
            $prodi_id = Prodi::where('prodi', $row['prodi'])->first();
            if ($peminatan_id && $prodi_id != null) {
                Alumni::create([
                    'no_alumni' => $row['no_alumni'],
                    'npm' => $row['npm'],
                    'nama' => $row['nama'],
                    'falkutas' => $row['falkutas'],
                    'prodi' => $prodi_id['id'],
                    'peminatan' => $peminatan_id['id'],
                    'stambuk' => $row['stambuk'],
                    'sempro' => $this->transformDate($row['sempro']),
                    'semhas' => $this->transformDate($row['semhas']),
                    'mejahijau' => $this->transformDate($row['mejahijau']),
                    'yudisium' => $this->transformDate($row['yudisium']),
                    'thn_lulus' => $row['thn_lulus'],
                    'judul' => $row['judul'],
                ]);
            }
        }
    }

    private function transformDate($value)
    {
        $formats = ['d/m/y', 'd-m-Y', 'Y-m-d', 'd/m/Y'];

        foreach ($formats as $format) {
            try {
                return Carbon::createFromFormat($format, $value)->format('Y-m-d');
            } catch (\Exception $e) {
                continue;
            }
        }

        // Jika tidak ada format yang cocok, kembalikan null
        return null;
    }
}