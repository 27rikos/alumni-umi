<?php

namespace App\Http\Controllers;

use App\Models\Kategori_mahasiswa;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class FakultasKemahasiswaanController extends Controller
{
    public function index()
    {
        $prodi_id = Prodi::where('prodi', auth()->user()->prodi)->value('id');

        if (!$prodi_id) {
            abort(404, 'Program Studi Tidak Ditemukan');
        }
        $data = Mahasiswa::where('fakultas', auth()->user()->fakultas)->where('prodi', $prodi_id)->get();
        return view('falkutas.kemahasiswaan.index', compact('data'));
    }

    public function create()
    {
        $kategori = Kategori_mahasiswa::all();
        return view('falkutas.kemahasiswaan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $prodi = Prodi::where('prodi', auth()->user()->prodi)->value('id');
        $fakultas = auth()->user()->fakultas;

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
            'tahun_masuk' => 'required',
            'kelas' => 'required',
            'kategori' => 'required',
            'asal' => 'required',
        ]);
        Mahasiswa::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'tempat_lhr' => $request->tempat_lhr,
            'tanggal_lhr' => $request->tanggal_lhr,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pos' => $request->pos,
            'hp' => $request->hp,
            'telp' => $request->telp,
            'email' => $request->email,
            'masuk' => $request->masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
            'prodi' => $prodi,
            'fakultas' => $fakultas,
            'tahun_masuk' => $request->tahun_masuk,
            'kelas' => $request->kelas,
            'kategori' => $request->kategori,
            'asal' => $request->asal,
        ]);
        return redirect()->route('kemahasiswaan-fakultas.index')->with('toast_success', 'Data Mahasiswa Berhasil Disimpan');
    }

    public function edit($id)
    {
        $kategori = Kategori_mahasiswa::all();
        $data = Mahasiswa::findOrFail($id);
        return view('falkutas.kemahasiswaan.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('kemahasiswaan-fakultas.index')->with('toast_success', 'Data Mahasiswa Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->delete();
        return redirect()->route('kemahasiswaan-fakultas.index')->with('toast_success', 'Data Mahasiswwa Berhasil Dihapus');
    }
}
