<?php

namespace App\Imports;

use App\Models\Dosen;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Dosen::create([
                'nidn' => $row['nidn'],
                'nama' => $row['nama'],
            ]);
        }
    }
}