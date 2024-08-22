<?php

namespace App\Exports;

use App\Models\Alumni;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class filter implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $data;
    use Exportable;
    public function __construct($start, $end, $filter)
    {
        $this->data = Alumni::where('status', 1)->whereBetween($filter, [$start, $end])->get();

    }
    public function view(): View
    {
        return view('falkutas.print.filter', ['data' => $this->data]);
    }

}
