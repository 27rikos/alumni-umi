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
        $this->data = Alumni::with('minat', 'prodis', 'dosenpenguji1', 'dosenpenguji2')->where('status', 1)->where('fakultas', auth()->user()->fakultas)->get();
    }
    public function view(): View
    {
        return view('falkutas.print.excel-download', ['data' => $this->data]);
    }
}