<?php

namespace App\Exports;

use App\Models\Alumni;
use App\Models\Prodi;
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
        // Cari ID Prodi berdasarkan nama prodi user yang sedang login
        $id_prodi = Prodi::where('prodi', Auth()->user()->prodi)->value('id');
        $this->data = Alumni::with('minat', 'prodis', 'dosenpenguji1', 'dosenpenguji2')
            ->where('status', 1)
            ->where('fakultas', auth()->user()->fakultas)
            ->where('prodi', $id_prodi)
            ->get();
    }
    public function view(): View
    {
        return view('falkutas.print.excel-download', ['data' => $this->data]);
    }
}