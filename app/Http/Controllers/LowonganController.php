<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lowongan::all();
        return view('admin.Lowongan.Index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Lowongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'perusahaan' => 'required',
            'posisi' => 'required',
            'kualifikasi' => 'required',
            'gaji' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);
        Lowongan::create($request->all());
        return redirect()->route('jobfair.index')->with('toast_success', 'Lowongan Kerja Berhasil Dibagikan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lowongan::findOrFail($id);
        return view('admin.Lowongan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Lowongan::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('jobfair.index')->with('toast_success', 'Lowongan Kerja Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lowongan::findOrFail($id)->delete();
        return redirect()->route('jobfair.index')->with('toast_success', 'Lowongan Kerja Berhasil Dihapus');
    }
}
