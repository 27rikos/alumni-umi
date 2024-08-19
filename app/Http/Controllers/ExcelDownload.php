<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use App\Exports\FalkutasExport;
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
}