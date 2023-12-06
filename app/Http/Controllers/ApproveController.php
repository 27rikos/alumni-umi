<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class ApproveController extends Controller
{

    public function approve($id)
    {
        $data = Alumni::where('id', $id)->first();
        $data->update([
            'status' => 1
        ]);
        return redirect()->route('alumni.index')->with('success', 'Data Di approve');
    }
}