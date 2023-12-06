<?php

namespace App\Http\Controllers;

use App\Models\Peminatan;
use Illuminate\Http\Request;

class PeminatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminatan = Peminatan::all();
        return view('admin.Peminatan.Index', compact('peminatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.Peminatan.Create");
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
            "kd_peminatan" => 'required',
            "peminatan" => "required",
        ]);

        Peminatan::create([
            "kd_peminatan" => $request->kd_peminatan,
            "peminatan" => $request->peminatan,
        ]);
        return redirect()->route('peminatan.index')->with('success', 'Peminatan Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminatan  $peminatan
     * @return \Illuminate\Http\Response
     */
    public function show(Peminatan $peminatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminatan  $peminatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Peminatan::where('id', $id)->first();
        return view('admin.Peminatan.Edit', compact(['find']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminatan  $peminatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Peminatan::where('id', $id)->first();

        $request->validate([
            "kd_peminatan" => 'required',
            "peminatan" => "required",
        ]);
        $data->update([
            "kd_peminatan" => $request->kd_peminatan,
            "peminatan" => $request->peminatan,
        ]);
        return redirect()->route('peminatan.index')->with('success', 'Peminatan Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminatan  $peminatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Peminatan::where('id', $id)->first();
        $data->delete();
        return redirect()->route('peminatan.index')->with('success', 'Peminatan Dihapus');
    }
}
