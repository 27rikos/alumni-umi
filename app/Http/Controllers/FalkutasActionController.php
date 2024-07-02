<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Peminatan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class FalkutasActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Alumni::with('prodis', 'minat')->where(function ($query) {
            $query->where('falkutas', Auth()->user()->name);
        })->get();
        return view("falkutas.main.index", compact("data"));
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
        return view('falkutas.main.create', compact('prodi', 'peminatan'));
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
            "pekerjaan" => "required",
            "judul" => "required",
            "no_alumni" => "required",
            "alamat" => "required",
            "tempat_lhr" => "required",
            "tanggal_lhr" => "required",
            "ayah" => "required",
            "ibu" => "required",
            "ipk" => "required",
            "file" => "required|mimes:jpg,jpeg,png|max:2048",
        ], messages: [
            'npm.unique' => 'NIP sudah digunakan',
            'file.mimes' => 'Format file foto harus jpg,jpeg,png',
        ]);
        $falkutas = auth()->user()->name;
        $data = Alumni::create([
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
            "pekerjaan" => $request->pekerjaan,
            "judul" => $request->judul,
            "falkutas" => $falkutas,
            "file" => $request->file,
            "no_alumni" => $request->no_alumni,
            "alamat" => $request->alamat,
            "tempat_lhr" => $request->tempat_lhr,
            "tanggal_lhr" => $request->tanggal_lhr,
            "ayah" => $request->ayah,
            "ibu" => $request->ibu,
            "ipk" => $request->ipk,
        ]);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/alumni/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('falkutas.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminatan = Peminatan::all();
        $prodi = Prodi::all();
        $find = Alumni::find($id);
        return view('falkutas.main.edit', compact('find', 'peminatan', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Alumni::findOrFail($id);
        // Simpan data yang akan diupdate ke dalam array
        $updateData = $request->only([
            'npm', 'nama', 'stambuk', 'peminatan', 'prodi',
            'thn_lulus', 'sempro', 'semhas', 'mejahijau',
            'yudisium', 'judul', 'pekerjaan', 'no_alumni', 'ipk', 'tanggal_lhr', 'tempat_lhr',
            'ayah', 'ibu', 'alamat',
        ]);

        // Cek apakah file baru diupload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file foto lama jika ada
            if ($data->file) {
                $oldPhotoPath = public_path('images/alumni/' . $data->file);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Simpan file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/alumni'), $fileName);

            // Tambahkan nama file baru ke data update
            $updateData['file'] = $fileName;
        }

        // Update data user
        $data->update($updateData);
        return redirect()->route('falkutas.index')->with('toast_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
