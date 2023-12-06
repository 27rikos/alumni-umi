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
        //upload image:
        $foto = $request->file('file');
        $foto->storeAs('public/video', $foto->hashName());
        Video::create([
            "judul" => $request->judul,
            "link" => $request->link,
            "file" => $foto->hashName(),
        ]);
        return redirect()->route('Video.index')->with('success', 'Video Ditambahkan');
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
        $find = Video::where('id', $id)->first();

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
        $data = Video::where('id', $id)->first();
        $this->validate($request, rules: [
            'judul' => 'required',
            'link' => 'required',
            "file" => "mimes:jpg,jpeg,png|max:2048",
        ], messages: [
            'file.mimes' => 'Format file foto harus jpg,jpeg,png',
            'file.max' => 'Ukuran Foto max 2mb'
        ]);

        if ($request->hasFile('file')) {

            //upload image:
            $foto = $request->file('file');
            $foto->storeAs('public/video', $foto->hashName());
            //hapus foto lama
            Storage::disk('public')->delete('video/' . $data['file']);
            $data->update([
                "judul" => $request->judul,
                "link" => $request->link,
                "file" => $foto->hashName(),
            ]);
        } else {
            $data->update([
                "judul" => $request->judul,
                "link" => $request->link,
            ]);
        }
        return redirect()->route('Video.index')->with('success', 'Video Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Video::where('id', $id)->first();
        Storage::disk('public')->delete('video/' . $data['file']);

        $data->delete();
        return redirect()->route('Video.index')->with('success', 'Video Dihapus');
    }
}
