<?php

namespace App\Http\Controllers;

use App\Models\Kategori_mahasiswa;
use Illuminate\Http\Request;

class KategoriMahasiswaController extends Controller
{
    public function index()
    {
        $data = Kategori_mahasiswa::all();
        return view('admin.kategori_mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori_mahasiswa.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required',
        ]);
        $data = Kategori_mahasiswa::create($request->all());
        $data->save();
        return redirect()->route('kategori_mahasiswa.index')->with('toast_success', 'Kategori Mahasiswa Ditambahkan');
    }

    public function edit($id)
    {
        $data = Kategori_mahasiswa::findOrFail($id);
        return view('admin.kategori_mahasiswa.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Kategori_mahasiswa::findOrFail($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('kategori_mahasiswa.index')->with('toast_success', 'Kategori Mahasiswa Diubah');
    }

    public function destroy($id)
    {
        $data = Kategori_mahasiswa::findOrFail($id);
        $data->delete();
        return redirect()->route('kategori_mahasiswa.index')->with('toast_success', 'Kategori Mahasiswa Dihapus');
    }
}