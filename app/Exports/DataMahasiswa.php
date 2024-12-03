<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataMahasiswa implements FromView, ShouldAutoSize
{
    private $data;
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($tahun_masuk)
    {
        $this->data = Mahasiswa::with('prodi_mahasiswa')->where('tahun_masuk', $tahun_masuk)->get();
    }

    public function view(): View
    {
        return view('admin.print.export-mahasiswa', ['data' => $this->data]);
    }

}