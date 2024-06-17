<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDownload extends Controller
{
    public function exportdata()
    {
        // return Excel::download(AlumniExport::class);
        return Excel::download(new AlumniExport(), 'alumni.xlsx');
    }
}
