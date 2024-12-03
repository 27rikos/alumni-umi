<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportMahasiswa implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $prodi_id = Prodi::where('prodi', $row['prodi'])->first();

            if ($prodi_id != null) {
                $tanggal_lhr = isset($row['tanggal_lhr']) ? $this->transformDate($row['tanggal_lhr']) : null;
                $tanggal_masuk = isset($row['tanggal_masuk']) ? $this->transformDate($row['tanggal_masuk']) : null;

                Log::info('parsed date:', [
                    'tanggal lahir' => $tanggal_lhr,
                    'tanggal masuk' => $tanggal_masuk,
                ]);
                Mahasiswa::create([
                    'npm' => $row['npm'],
                    'nama' => $row['nama'],
                    'nik' => $row['nik'],
                    'gender' => $row['gender'],
                    'tempat_lhr' => $row['tempat_lhr'],
                    'tanggal_lhr' => $tanggal_lhr,
                    'provinsi' => $row['provinsi'],
                    'kota' => $row['kota'],
                    'alamat' => $row['alamat'],
                    'kewarganegaraan' => $row['kewarganegaraan'],
                    'pos' => $row['pos'],
                    'hp' => $row['hp'],
                    'telp' => $row['telp'],
                    'email' => $row['email'],
                    'masuk' => $row['semester_masuk'],
                    'tanggal_masuk' => $tanggal_masuk,
                    'prodi' => $prodi_id['id'],
                    'fakultas' => $row['fakultas'],
                    'tahun_masuk' => $row['tahun_masuk'],
                    'kelas' => $row['kelas'],
                    'asal' => $row['asal'],
                ]);
            } else {
                Log::warning('Prodi tidak ditemukan:', [
                    'prodi' => $row['prodi'],
                ]);
            }
        }
    }
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