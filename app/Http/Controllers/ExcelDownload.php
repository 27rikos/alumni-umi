<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use App\Exports\FalkutasExport;
use App\Exports\filter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDownload extends Controller
{
    public function exportdata()
    {
        // return Excel::download(AlumniExport::class);
        return Excel::download(new AlumniExport(), 'alumni.xlsx');
    }
    public function exportfalkutas()
    {
        return Excel::download(new FalkutasExport(), 'falkutas.xlsx');
    }
    public function filter(Request $request)
    {
        $filter = $request->input('filteredby');
        $end = $request->input('end');
        $start = $request->input('start');

        return Excel::download(new filter($start, $end, $filter), 'filter.xlsx');
    }
}
