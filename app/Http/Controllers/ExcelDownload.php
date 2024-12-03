<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use App\Exports\bukuExport;
use App\Exports\FalkutasExport;
use App\Exports\filter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDownload extends Controller
{
    public function exportdata()
    {
        return Excel::download(new AlumniExport(), 'data-alumni.xlsx');
    }
    public function exportfalkutas()
    {
        $fakultas = auth()->user()->fakultas;
        $filename = 'alumni_' . $fakultas . '.xlsx';
        return Excel::download(new FalkutasExport(), $filename);
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filteredby');
        $tahun = $request->input('tahun');
        $filename = 'filter_' . $tahun . '_' . $filter . '.xlsx';

        return Excel::download(new filter($tahun, $filter), $filename);
    }

    public function graduate(Request $request)
    {
        $tahun = $request->input('tahun');
        $fakultas = $request->input('fakultas');
        $nameFile = "buku_wisudawan_" . $tahun . "_" . $fakultas . ".xlsx";
        return Excel::download(new bukuExport($tahun, $fakultas), $nameFile);
    }
}
