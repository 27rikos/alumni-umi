<?php

namespace App\Http\Controllers;

use App\Models\JenisKerjasama;
use App\Models\Kerjasama;
use Illuminate\Http\Request;

class FakultasKerjasamaController extends Controller
{
    public function index()
    {
        $data = Kerjasama::all();
        return view('falkutas.kerjasama.index', compact('data'));
    }

    public function create()
    {
        $jenis_kerjasama = JenisKerjasama::all();
        return view('falkutas.kerjasama.create', compact('jenis_kerjasama'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'instansi' => 'required',
            'jenis_kerjasama' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'file' => 'required|max:1024',
            'foto' => 'required|max:1024',
        ], [
            'file.max' => 'ukuran dokumen maksimal 1MB',
            'foto.max' => 'ukuran foto maksimal 1MB',
        ]);

        $data = Kerjasama::create([
            'instansi' => $request->instansi,
            'jenis_kerjasama' => $request->jenis_kerjasama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);
        // upload dokumen
        if ($request->hasFile('file')) {
            $filename = 'dokumen_' . time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move('dokumen/kerjasama', $filename);
            $data->file = $filename;
        }
        // upload logo
        if ($request->hasfile('foto')) {
            $filename = 'logo_' . time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images/logo_instansi', $filename);
            $data->foto = $filename;
        }
        $data->save();

        return redirect()->route('kerjasama-fakultas.index')->with('toast_success', 'Kerjasama Berhasil Dibuat');
    }

    public function edit($id)
    {
        $jenis_kerjasama = JenisKerjasama::all();
        $data = Kerjasama::findOrFail($id);
        return view('falkutas.kerjasama.edit', compact('jenis_kerjasama', 'data'));
    }
}