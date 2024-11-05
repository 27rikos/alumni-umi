<?php

namespace App\Exports;

use App\Models\Alumni;
use Illuminate\Contracts\View\View;
use InvalidArgumentException;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class filter implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $data;
    use Exportable;
    public function __construct($tahun, $filter)
    {
        // Validate the year input
        if (is_numeric($tahun) && strlen($tahun) === 4 && $tahun >= 1900 && $tahun <= date('Y')) {
            $this->data = Alumni::where('status', 1)
                ->whereYear($filter, $tahun) // Use whereYear for date filtering
                ->get();
        } else {
            throw new InvalidArgumentException('Invalid year provided. Year must be a four-digit number between 1900 and the current year.');
        }

    }
    public function view(): View
    {
        return view('falkutas.print.filter', ['data' => $this->data]);
    }

}
