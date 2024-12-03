<?php

namespace App\Exports;

use App\Models\Alumni;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class bukuExport implements FromView, ShouldAutoSize
{
    private $data;
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($tahun, $fakultas)
    {
        $this->data = Alumni::select(
            'no_alumni', 'nama', 'fakultas', 'npm', 'tempat_lhr', 'tanggal_lhr',
            'provinsi', 'kota', 'kecamatan', 'kelurahan', 'yudisium',
            'ipk', 'ayah', 'ibu', 'judul'
        )
            ->whereYear('yudisium', $tahun)
            ->where('status', 1)
            ->where('fakultas', $fakultas)
            ->get();
    }

    public function view(): View
    {
        return view('admin.print.book', ['data' => $this->data]);
    }
}
