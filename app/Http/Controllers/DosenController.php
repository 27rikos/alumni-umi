<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dosen::where('status', 'aktif')->get();
        return view('admin.dosen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dosen.create');
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
            'nidn' => 'required',
            'nama' => 'required',
            'tanggal_masuk' => 'required',
            'gelar' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'email' => 'required',
        ]);
        $data = Dosen::create($request->all());
        $data->save();
        return redirect()->route('dosen.index')->with('toast_success', 'Data Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Dosen::findOrFail($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('dosen.index')->with('toast_success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Dosen::findOrFail($id);
        $data->delete();
        return redirect()->route('dosen.index')->with('toast_success', 'Data Diubah');

    }
}
