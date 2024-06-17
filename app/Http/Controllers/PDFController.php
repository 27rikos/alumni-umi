<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Alumni;

class PDFController extends Controller
{
    public function preview()
    {
        $alumni = Alumni::with('minat', 'prodis')->get();
        return view('admin.print.print', compact('alumni'));
    }

    public function print()
    {
        $data = Alumni::with('minat', 'prodis')->get();
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadview('admin.print.print', ['alumni' => $data])->setPaper($customPaper, 'landscape');
        return $pdf->download('laporan-alumni.pdf');
    }
}