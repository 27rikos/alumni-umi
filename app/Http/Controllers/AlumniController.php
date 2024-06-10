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
            "pekerjaan" => "required",
            "judul" => '',
            "file" => "required|mimes:jpg,jpeg,png|max:2048",
        ], messages: [
            'npm.unique' => 'NIP sudah digunakan',
            'file.mimes' => 'Format file foto harus jpg,jpeg,png'
        ]);
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
            "file" => $request->file,
        ]);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/alumni/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('alumni.index')->with('toast_success', 'Data Berhasil Ditambahkan');
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
        $find = Alumni::where('id', $id)->with('prodis', 'minat')->first();
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
        $data = Alumni::findOrFail($id);
        // Simpan data yang akan diupdate ke dalam array
        $updateData = $request->only([
            'npm', 'nama', 'stambuk', 'peminatan', 'prodi',
            'thn_lulus', 'sempro', 'semhas', 'mejahijau',
            'yudisium', 'judul', 'pekerjaan'
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

        return redirect()->route('alumni.index')->with('toast_success', 'Data Berhasil Diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Alumni::findOrFail($id);
        if ($data->file) {
            $oldPhotoPath = 'images/alumni/' . $data->file;
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); // Hapus file foto lama dari direktori
            }
        }
        $data->delete();

        return redirect()->route('alumni.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}