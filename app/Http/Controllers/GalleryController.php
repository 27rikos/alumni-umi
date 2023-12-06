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
        //upload foto:
        $foto = $request->file('file');
        $foto->storeAs('public/gallery', $foto->hashName());

        Gallery::create([
            'keterangan' => $request->keterangan,
            'file' => $foto->hashName()
        ]);

        return redirect()->route('gallery.index')->with('success', 'Foto Ditambahkan');
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
        $find = Gallery::where('id', $id)->first();
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
        $data = Gallery::where('id', $id)->first();
        $this->validate($request, rules: [
            'keterangan' => 'required',
            'file' => 'mimes:png,jpg,jpeg|max:2048'
        ], messages: [
            'file.mimes' => 'Format file foto harus jpg,jpeg,png',
            'file.max' => 'Ukuran Foto max 2mb'
        ]);

        if ($request->hasFile('file')) {

            //upload foto:
            $foto = $request->file('file');
            $foto->storeAs('public/gallery', $foto->hashName());
            //hapus foto lama
            Storage::disk('public')->delete('gallery/' . $data['file']);
            $data->update([
                'keterangan' => $request->keterangan,
                'file' => $foto->hashName()
            ]);
        } else {
            $data->update([
                'keterangan' => $request->keterangan,
            ]);
        }
        return redirect()->route('gallery.index')->with('success', 'Foto Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Gallery::where('id', $id)->first();
        Storage::disk('public')->delete('gallery/' . $data['file']);
        $data->delete();
        return redirect()->route('gallery.index')->with('success', 'Foto Dihapus');
    }
}
