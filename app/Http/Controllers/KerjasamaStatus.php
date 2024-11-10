<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;

class KerjasamaStatus extends Controller
{
    public function active($id)
    {
        $data = Kerjasama::findOrFail($id);
        $data->update([
            'status' => 'aktif',
        ]);
        return redirect()->route('cooperation.index')->with('toast_info', 'Kerjasama Telah Diaktifkan');
    }
    public function nonaktif($id)
    {
        $data = Kerjasama::findOrFail($id);
        $data->update([
            'status' => 'nonaktif',
        ]);
        return redirect()->route('cooperation.index')->with('toast_info', 'Kerjasama Telah Dinonaktifkan');
    }
    public function selesai($id)
    {
        $data = Kerjasama::findOrFail($id);
        $data->update([
            'status' => 'selesai',
        ]);
        return redirect()->route('cooperation.index')->with('toast_info', 'Kerjasama Telah Selesai');
    }
}
