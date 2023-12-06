<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodis = Prodi::all();
        return view('admin.Prodi.Index', compact(['prodis']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Prodi.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_prodi' => 'required',
            'prodi' => 'required',
        ]);
        Prodi::create([
            'kd_prodi' => $request->kd_prodi,
            'prodi' => $request->prodi,
        ]);
        return redirect()->route('prodi.index')->with('success', 'Prodi Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = Prodi::find($id)->first();
        return view('admin.Prodi.Edit', compact(['prodi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prodi = Prodi::where('id', $id)->first();

        $request->validate([
            'kd_prodi' => 'required',
            'prodi' => 'required',
        ]);

        $prodi->update([
            'kd_prodi' => $request->kd_prodi,
            'prodi' => $request->prodi,
        ]);
        return redirect()->route('prodi.index')->with('success', 'Prodi Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Prodi::where('id', $id)->first();

        $data->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi Dihapus');
    }
}
