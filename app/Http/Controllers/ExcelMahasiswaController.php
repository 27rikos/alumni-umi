<?php

namespace App\Http\Controllers;

use App\Exports\DataMahasiswa;
use App\Imports\ImportMahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelMahasiswaController extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx,csv|max:1024',
        ], [
            'file.mime' => 'Ukuran File Max 1Mb',
        ]);

        Excel::import(new ImportMahasiswa, $request->file);
        return redirect()->route('mahasiswa.index')->with('toast_success', 'Import Data Berhasil');
    }

    public function export(Request $request)
    {
        $tahun_masuk = $request->input('tahun_masuk');
        $name_file = 'data_mahasiswa' . $tahun_masuk . '.xlsx';
        return Excel::download(new DataMahasiswa($tahun_masuk), $name_file);

    }
}