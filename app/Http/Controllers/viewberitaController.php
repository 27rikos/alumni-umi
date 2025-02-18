<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;

class viewberitaController extends Controller
{
    public function tampil_berita($id)
    {
        $data = Berita::where('id', $id)->first();
        $all  = Berita::orderBy('created_at', 'asc')->paginate(5);
        return view('Partials.ViewBerita', compact(['data', 'all']));
    }

    public function show(Request $request)
    {
        $search     = $request->input('search');
        $categories = $request->input('category');
        $kategori   = Category::all();
        $datas      = Berita::with('kategori')
            ->orderBy('created_at', 'asc')
            ->when($search, function ($query) use ($search) {
                return $query->where('judul', 'like', '%' . $search . '%');
            })
            ->when($categories, function ($query) use ($categories) {
                return $query->where('kategori_id', $categories);
            })
            ->paginate(5);

        return view('FrontPage.BeritaLama', compact('datas', 'kategori'));
    }
}