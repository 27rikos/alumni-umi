<?php

namespace App\Imports;

use App\Models\Alumni;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

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

            \Log::info('Row data:', $row->toArray());

            if (empty(trim($row['nama']))) {
                continue; 
            }
            
            $sempro = isset($row['sempro']) ? $this->transformDate($row['sempro']) : null;
            $semhas = isset($row['semhas']) ? $this->transformDate($row['semhas']) : null;
            $mejahijau = isset($row['mejahijau']) ? $this->transformDate($row['mejahijau']) : null;
            $yudisium = isset($row['yudisium']) ? $this->transformDate($row['yudisium']) : null;

            $numericValue = isset($row['some_numeric_field']) ? floatval($row['some_numeric_field']) : 0;
            $flooredValue = floor($numericValue); 

            \Log::info('Parsed dates:', [
                'sempro' => $sempro,
                'semhas' => $semhas,
                'mejahijau' => $mejahijau,
                'yudisium' => $yudisium,
                'flooredValue' => $flooredValue,
            ]);


            Alumni::updateOrCreate(
                ['npm' => $row['npm']],
                [
                    'nama' => $row['nama'],
                    'peminatan_id' => $row['peminatan_id'],
                    'prodi_id' => $row['prodi_id'],
                    'sempro' => $sempro,
                    'semhas' => $semhas,
                    'mejahijau' => $mejahijau,
                    'yudisium' => $yudisium,
                ]
            );
        }
    }

    /**
     * 
     *
     * @param mixed $value
     * @return \Carbon\Carbon|null
     */
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

        return null;
    }
}
