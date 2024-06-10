<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foto = Gallery::all();
        return view('admin.Gallery.Index', compact(['foto']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Gallery.Create');
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
            'keterangan' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ], messages: [
            'file.mimes' => 'Format file foto harus jpg,jpeg,png',
            'file.max' => 'Ukuran Foto max 2mb'
        ]);


        $data = Gallery::create([
            'keterangan' => $request->keterangan,
            'file' => $request->file
        ]);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/foto/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('gallery.index')->with('toast_success', 'Foto Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Gallery::findOrFail($id);
        return view('admin.Gallery.Edit', compact(['find']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Gallery::findOrFail($id);
        // Simpan data yang akan diupdate ke dalam array
        $updateData = $request->only([
            'keterangan', 'file'
        ]);

        // Cek apakah file baru diupload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file foto lama jika ada
            if ($data->file) {
                $oldPhotoPath = public_path('images/foto/' . $data->file);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Simpan file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/foto'), $fileName);

            // Tambahkan nama file baru ke data update
            $updateData['file'] = $fileName;
        }

        // Update data user
        $data->update($updateData);
        return redirect()->route('gallery.index')->with('toast_success', 'Foto Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Gallery::findOrFail($id);
        if ($data->file) {
            $oldPhotoPath = 'images/foto/' . $data->file;
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); // Hapus file foto lama dari direktori
            }
        }
        $data->delete();
        return redirect()->route('gallery.index')->with('toast_success', 'Foto Dihapus');
    }
}