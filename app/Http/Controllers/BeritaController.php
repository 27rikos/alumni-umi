<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        return view('admin.Berita.Index', compact(['berita']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Berita.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, rules: [
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'konten' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
        ], messages: [
            'file.mimes' => 'Foto harus format jpg,jpeg,png '
        ]);
        //upload foto:
        $foto = $request->file('file');
        $foto->storeAs('public/berita', $foto->hashName());
        Berita::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
            'file' => $foto->hashName(),
        ]);
        return redirect()->route('berita.index')->with('success', 'Berita Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Berita::where('id', $id)->first();
        return view('admin.Berita.Edit', compact(['find']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = Berita::where('id', $id)->first();
        $this->validate($request, rules: [
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'konten' => 'required',
            'file' => 'mimes:jpg,png,jpeg|max:2048',
        ], messages: [
            'file.mimes' => 'Foto harus format jpg,jpeg,png '
        ]);
        if ($request->hasFile('file')) {

            //upload image:
            $foto = $request->file('file');
            $foto->storeAs('public/berita', $foto->hashName());
            //hapus foto lama
            Storage::disk('public')->delete('berita/' . $data['file']);
            $data->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'tanggal' => $request->tanggal,
                'konten' => $request->konten,
                'file' => $foto->hashName(),
            ]);
        } else {
            $data->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'tanggal' => $request->tanggal,
                'konten' => $request->konten,
            ]);
        }
        return redirect()->route('berita.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::where('id', $id)->first();
        Storage::disk('public')->delete('berita/' . $data['file']);
        $data->delete();
        return redirect()->route('berita.index')->with('success', 'Data Berhasil Dihapus');
    }
}
