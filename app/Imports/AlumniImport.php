<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\Peminatan;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
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
                // Transformasi tanggal dengan logging tambahan
                $sempro = isset($row['sempro']) ? $this->transformDate($row['sempro']) : null;
                $semhas = isset($row['semhas']) ? $this->transformDate($row['semhas']) : null;
                $mejahijau = isset($row['mejahijau']) ? $this->transformDate($row['mejahijau']) : null;
                $yudisium = isset($row['yudisium']) ? $this->transformDate($row['yudisium']) : null;

                // Logging hasil transformasi tanggal
                Log::info('Parsed dates:', [
                    'sempro' => $sempro,
                    'semhas' => $semhas,
                    'mejahijau' => $mejahijau,
                    'yudisium' => $yudisium,
                ]);

                Alumni::create([
                    'no_alumni' => $row['no_alumni'],
                    'npm' => $row['npm'],
                    'nama' => $row['nama'],
                    'falkutas' => $row['falkutas'],
                    'prodi' => $prodi_id['id'],
                    'peminatan' => $peminatan_id['id'],
                    'stambuk' => $row['stambuk'],
                    'sempro' => $sempro,
                    'semhas' => $semhas,
                    'mejahijau' => $mejahijau,
                    'yudisium' => $yudisium,
                    'thn_lulus' => $row['thn_lulus'],
                    'judul' => $row['judul'],
                ]);
            } else {
                Log::warning('Peminatan atau Prodi tidak ditemukan:', [
                    'peminatan' => $row['peminatan'],
                    'prodi' => $row['prodi'],
                ]);
            }
        }
    }

    /**
     * Mengubah format tanggal menjadi Y-m-d dengan logging tambahan untuk debugging.
     *
     * @param mixed $value
     * @return \Carbon\Carbon|null
     */
    private function transformDate($value)
    {
        Log::info('Original date value:', ['value' => $value]);

        // Jika nilai adalah instance DateTime
        if ($value instanceof \DateTime) {
            Log::info('Date is already an instance of DateTime:', ['date' => $value->format('Y-m-d')]);
            return $value->format('Y-m-d');
        }

        // Jika tanggal berupa angka serial Excel
        if (is_numeric($value)) {
            $date = Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
            Log::info('Date converted from Excel serial:', ['date' => $date->format('Y-m-d')]);
            return $date->format('Y-m-d');
        }

        // Proses tanggal jika dalam format string
        $formats = ['d/m/y', 'd-m-Y', 'Y-m-d', 'd/m/Y'];

        foreach ($formats as $format) {
            try {
                $date = Carbon::createFromFormat($format, $value);
                Log::info('Date matched with format:', ['format' => $format, 'date' => $date->format('Y-m-d')]);
                return $date->format('Y-m-d');
            } catch (\Exception $e) {
                Log::warning('Date format mismatch:', ['format' => $format, 'value' => $value]);
                continue;
            }
        }

        Log::error('No matching date format found', ['value' => $value]);
        return null;
    }

}