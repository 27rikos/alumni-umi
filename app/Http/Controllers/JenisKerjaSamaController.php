<?php

namespace App\Http\Controllers;

use App\Models\JenisKerjasama;
use Illuminate\Http\Request;

class JenisKerjaSamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisKerjasama::all();
        return view('admin.jenis_kerjasama.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis_kerjasama.create');
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
            'jenis_kerjasama' => 'required',
        ]);
        $data = JenisKerjasama::create($request->all());
        $data->save();
        return redirect()->route('cooperation-type.index')->with('toast_success', 'Jenis kerjasama Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKerjasama  $jenisKerjasama
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKerjasama $jenisKerjasama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKerjasama  $jenisKerjasama
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JenisKerjasama::findOrFail($id);
        return view('admin.jenis_kerjasama.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKerjasama  $jenisKerjasama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = JenisKerjasama::findOrFail($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('cooperation-type.index')->with('toast_success', 'Jenis kerjasama Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKerjasama  $jenisKerjasama
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JenisKerjasama::findOrFail($id);
        $data->delete();
        return redirect()->route('cooperation-type.index')->with('toast_success', 'Jenis kerjasama Dihapus');
    }
}