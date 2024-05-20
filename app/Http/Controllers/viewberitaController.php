<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class viewberitaController extends Controller
{
    public function tampil_berita($id)
    {
        $data = Berita::where('id', $id)->first();
        $all = Berita::orderBy('created_at', 'asc')->paginate(5);
        return view('Partials.ViewBerita', compact(['data', 'all']));
    }

    public function show()
    {
        $datas = Berita::latest()->paginate()->all();
        return view('FrontPage.BeritaLama', compact(['datas']));
    }
}
