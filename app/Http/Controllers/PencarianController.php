<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index()
    {
        $datas = Alumni::with('minat', 'prodis')->where('status', 1)->Paginate(10);
        return view('FrontPage.Pencarian', compact(['datas']));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        // Cek apakah $cari bernilai null atau kosong
        if (is_null($cari) || trim($cari) === '') {
            return back()->with('error', 'Kata kunci pencarian tidak boleh kosong.');
        }

        $datas = Alumni::where('stambuk', 'like', "%" . $cari . "%")
            ->orWhere('npm', 'like', "%" . $cari . "%")
            ->orWhere('nama', 'like', "%" . $cari . "%")
            ->where('status', 1)
            ->paginate();

        return view('FrontPage.Pencarian', compact('datas'));
    }

}