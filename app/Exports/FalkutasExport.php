<?php

namespace App\Exports;

use App\Models\Alumni;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class FalkutasExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $data;
    use Exportable;

    public function __construct()
    {
        $this->data = Alumni::where('status', 1)->where('falkutas', auth()->user()->name)->get();
    }
    public function view(): View
    {
        return view('falkutas.print.excel-download', ['data' => $this->data]);
    }
}
