<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class viewberitaController extends Controller
{
    public function tampil_berita($id)
    {
        $data = Berita::where('id', $id)->first();
        return view('Partials.ViewBerita', compact(['data']));
    }

    public function old()
    {
        $datas = Berita::latest()->paginate()->all();
        return view('FrontPage.BeritaLama', compact(['datas']));
    }
}
