<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $datas = Alumni::where('stambuk', 'like', "%" . $cari . "%")->orwhere('npm', 'like', "%" . $cari . "%")->orwhere('nama', 'like', "%" . $cari . "%")->Paginate();
        return view('FrontPage.Pencarian', compact(['datas']));
    }
}
