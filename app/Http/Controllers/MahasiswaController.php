<?php

namespace App\Http\Controllers;

use App\Models\Kategori_mahasiswa;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::with('prodi_mahasiswa')->get();
        return view('admin.mahasiswa.index', compact('data'));
    }

    public function create()
    {
        $kategori = Kategori_mahasiswa::all();
        $prodi = Prodi::all();
        return view('admin.mahasiswa.create', compact('prodi', 'kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'npm' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'gender' => 'required',
            'tempat_lhr' => 'required',
            'tanggal_lhr' => 'required|date',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',
            'pos' => 'required',
            'hp' => 'required',
            'telp' => 'required',
            'email' => 'required|email',
            'masuk' => 'required',
            'tanggal_masuk' => 'required|date',
            'prodi' => 'required',
            'fakultas' => 'required',
            'tahun_masuk' => 'required',
            'kelas' => 'required',
            'kategori' => 'required',
            'asal' => 'required',
        ]);
        $data = Mahasiswa::create($request->all());
        $data->save();
        return redirect()->route('mahasiswa.index')->with('toast_success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori_mahasiswa::all();
        $prodi = Prodi::all();
        $data = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('kategori', 'prodi', 'data'));
    }

    public function update(Request $request, $id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('mahasiswa.index')->with('toast_success', 'Mahasiswa Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->delete();
        return redirect()->route('mahasiswa.index')->with('toast_success', 'Mahasiswa Berhasil Dihapus');
    }
}
