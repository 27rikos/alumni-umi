<?php
namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Prodi;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $prodis = $request->input('prodi');
        $prodi  = Prodi::all();
        $datas  = Alumni::with('minat', 'prodis')->where('status', 1)->when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%')->orWhere('npm', 'like', '%' . $search . '%');
        })
            ->when($prodis, function ($query) use ($prodis) {
                return $query->where('prodi', $prodis);
            })->paginate(10);
        return view('FrontPage.Pencarian', compact('prodi', 'datas'));
    }

}