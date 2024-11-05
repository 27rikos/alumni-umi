<?php

namespace App\Exports;

use App\Models\Alumni;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AlumniExport implements FromView, ShouldAutoSize
{
    private $alumni;
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct()
    {
        $this->alumni = Alumni::with('minat', 'prodis', 'dosenpenguji1', 'dosenpenguji2')->where('status', 1)->get();
    }
    public function view(): View
    {
        return view('admin.print.excel_all', [
            'alumni' => $this->alumni,
        ]);
    }
}