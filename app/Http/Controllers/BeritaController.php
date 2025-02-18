<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
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
        $berita = Berita::with('kategori')->get();
        return view('admin.Berita.Index', compact(['berita']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Category::all();
        return view('admin.Berita.Create', compact('kategori'));
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
            'judul'       => 'required',
            'penulis'     => 'required',
            'tanggal'     => 'required',
            'konten'      => 'required',
            'file'        => 'required|mimes:jpg,jpeg,png|max:2048',
            'kategori_id' => 'required',
        ], messages: [
            'file.mimes' => 'Foto harus format jpg,jpeg,png ',
        ]);
        $data = Berita::create([
            'judul'       => $request->judul,
            'penulis'     => $request->penulis,
            'tanggal'     => $request->tanggal,
            'konten'      => $request->konten,
            'file'        => $request->file,
            'kategori_id' => $request->kategori_id,
        ]);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/berita/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('berita.index')->with('toast_success', 'Berita Ditambahkan');
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
        $kategori = Category::all();
        $find     = Berita::findOrFail($id);
        return view('admin.Berita.Edit', compact(['find', 'kategori']));
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

        $data = Berita::findOrFail($id);
        // Simpan data yang akan diupdate ke dalam array
        $updateData = $request->only([
            'judul', 'penulis', 'tanggal', 'konten', 'file', 'kategori_id',
        ]);

        // Cek apakah file baru diupload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file foto lama jika ada
            if ($data->file) {
                $oldPhotoPath = public_path('images/berita/' . $data->file);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Simpan file baru
            $file     = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/berita'), $fileName);

            // Tambahkan nama file baru ke data update
            $updateData['file'] = $fileName;
        }

        // Update data user
        $data->update($updateData);
        return redirect()->route('berita.index')->with('toast_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::findOrFail($id);
        if ($data->file) {
            $oldPhotoPath = 'images/berita/' . $data->file;
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); // Hapus file foto lama dari direktori
            }
        }
        $data->delete();
        return redirect()->route('berita.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}