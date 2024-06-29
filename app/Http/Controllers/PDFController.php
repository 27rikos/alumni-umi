<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function preview()
    {
        $alumni = Alumni::with('minat', 'prodis')->where('status', 1)->get();
        return view('admin.print.print', compact('alumni'));
    }

    public function print()
    {
        $data = Alumni::with('minat', 'prodis')->where('status', 1)->get();
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadview('admin.print.print', ['alumni' => $data])->setPaper($customPaper, 'landscape');
        return $pdf->download('laporan-alumni.pdf');
    }

    public function pdf()
    {
        $data_falkutas = Alumni::with('minat', 'prodis')->where('falkutas', auth()->user()->name)->where('status', 1)->get();
        return view('falkutas.print.print-pdf', compact('data_falkutas'));
    }
    public function printpdf()
    {
        $data_falkutas = Alumni::with('minat', 'prodis')->where('falkutas', auth()->user()->name)->where('status', 1)->get();
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadview('falkutas.print.print-pdf', ['data_falkutas' => $data_falkutas])->setPaper($customPaper, 'landscape');
        return $pdf->download('laporan-alumni.pdf');
    }
}
