<?php

namespace App\Http\Controllers;

use App\Models\Alumni;

class FalkutasController extends Controller
{
    public function approve($id)
    {
        $data = Alumni::where('id', $id)->first();
        $data->update([
            'status' => 1,
        ]);
        return redirect()->route('falkutas.index')->with('toast_success', 'Data Di Approve');
    }
    public function pending($id)
    {
        $data = Alumni::where('id', $id)->first();
        $data->update([
            'status' => 0,
        ]);
        return redirect()->route('falkutas.index')->with('toast_success', 'Data Di Pending');
    }

}