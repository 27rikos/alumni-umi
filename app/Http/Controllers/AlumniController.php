<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Alumni;
use App\Models\Prodi;
use App\Models\Peminatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = Alumni::with('minat', 'prodis')->get();
        return view('admin.Alumni.Index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminatan = Peminatan::all();
        $prodi = Prodi::all();
        return view("admin.Alumni.Create", compact(['prodi', 'peminatan']));
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
            "npm" => "required|unique:alumnis",
            "nama" => "required",
            "stambuk" => "required",
            "peminatan" => "required",
            "prodi" => "required",
            "thn_lulus" => "required",
            "sempro" => "required",
            "semhas" => "required",
            "mejahijau" => "required",
            "yudisium" => "required",
            "judul" => '',
            "file" => "required|mimes:jpg,jpeg,png|max:2048",
        ], messages: [
            'npm.unique' => 'NIP sudah digunakan',
            'file.mimes' => 'Format file foto harus jpg,jpeg,png'
        ]);
        //upload image:
        $foto = $request->file('file');
        $foto->storeAs('public/alumni_foto', $foto->hashName());

        Alumni::create([
            "npm" => $request->npm,
            "nama" => $request->nama,
            "stambuk" => $request->stambuk,
            "peminatan" => $request->peminatan,
            "prodi" => $request->prodi,
            "thn_lulus" => $request->thn_lulus,
            "sempro" => $request->sempro,
            "semhas" => $request->semhas,
            "mejahijau" => $request->mejahijau,
            "yudisium" => $request->yudisium,
            "judul" => $request->judul,
            "file" => $foto->hashName(),
        ]);

        return redirect()->route('alumni.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = Prodi::all();
        $peminatan = Peminatan::all();
        $find = Alumni::where('id', $id)->first();
        return view('admin.Alumni.Edit', compact(['find', 'prodi', 'peminatan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Alumni::where('id', $id)->first();
        $this->validate($request, rules: [
            "npm" => 'required', Rule::unique('alumnis')->ignore('alumnis'),
            "nama" => "required",
            "stambuk" => "required",
            "peminatan" => "required",
            "prodi" => "required",
            "thn_lulus" => "required",
            "sempro" => "required",
            "semhas" => "required",
            "mejahijau" => "required",
            "yudisium" => "required",
            "judul" => '',
            "file" => "mimes:jpg,jpeg,png|max:2048",
        ], messages: [
            'npm.unique' => 'NPM sudah digunakan',
            'file.mimes' => 'Format file foto harus jpg,jpeg,png',
            'file.max' => 'Ukuran Foto max 2mb'
        ]);
        if ($request->hasFile('file')) {

            //upload image:
            $foto = $request->file('file');
            $foto->storeAs('public/alumni_foto', $foto->hashName());
            //hapus foto lama
            Storage::disk('public')->delete('alumni_foto/' . $data['file']);
            $data->update([
                "npm" => $request->npm,
                "nama" => $request->nama,
                "stambuk" => $request->stambuk,
                "peminatan" => $request->peminatan,
                "prodi" => $request->prodi,
                "thn_lulus" => $request->thn_lulus,
                "sempro" => $request->sempro,
                "semhas" => $request->semhas,
                "mejahijau" => $request->mejahijau,
                "yudisium" => $request->yudisium,
                "judul" => $request->judul,
                "file" => $foto->hashName(),
            ]);
        } else {
            $data->update([
                "npm" => $request->npm,
                "nama" => $request->nama,
                "stambuk" => $request->stambuk,
                "peminatan" => $request->peminatan,
                "prodi" => $request->prodi,
                "thn_lulus" => $request->thn_lulus,
                "sempro" => $request->sempro,
                "semhas" => $request->semhas,
                "mejahijau" => $request->mejahijau,
                "yudisium" => $request->yudisium,
                "judul" => $request->judul,
            ]);
        }
        return redirect()->route('alumni.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Alumni::where('id', $id)->first();
        Storage::disk('public')->delete('alumni_foto/' . $data['file']);
        $data->delete();

        return redirect()->route('alumni.index')->with('success', 'Data Berhasil Dihapus');
    }
}
