<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.Video.Index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Video.Create');
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
            'link' => 'required',
            "file" => "mimes:jpg,jpeg,png|max:2048",
        ], messages: [
            'file.mimes' => 'Format file foto harus jpg,jpeg,png',
            'file.max' => 'Ukuran Foto max 2mb'
        ]);
        $data = Video::create([
            "judul" => $request->judul,
            "link" => $request->link,
            "file" => $request->file
        ]);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/thumbnail/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('Video.index')->with('toast_success', 'Video Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Video::findOrFail($id);

        return view('admin.Video.Edit', compact(['find']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Video::findOrFail($id);
        // Simpan data yang akan diupdate ke dalam array
        $updateData = $request->only([
            'judul', 'link', 'file'
        ]);

        // Cek apakah file baru diupload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file foto lama jika ada
            if ($data->file) {
                $oldPhotoPath = public_path('images/thumbnail/' . $data->file);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Simpan file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/thumbnail'), $fileName);

            // Tambahkan nama file baru ke data update
            $updateData['file'] = $fileName;
        }

        // Update data user
        $data->update($updateData);
        return redirect()->route('Video.index')->with('toast_success', 'Video Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Video::findOrFail($id);
        if ($data->file) {
            $oldPhotoPath = 'images/thumnail' . $data->file;
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); // Hapus file foto lama dari direktori
            }
        }
        $data->delete();
        return redirect()->route('Video.index')->with('toast_success', 'Video Dihapus');
    }
}