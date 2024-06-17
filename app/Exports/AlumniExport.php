<?php

namespace App\Exports;

use App\Models\Alumni;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
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
        $this->alumni = Alumni::all();
    }
    public function view(): View
    {
        return view('admin.print.print', [
            'alumni' => $this->alumni
        ]);
    }
}
