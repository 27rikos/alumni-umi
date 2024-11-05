<?php

namespace App\Http\Controllers;

use App\Models\JenisKerjasama;
use App\Models\Kerjasama;
use Illuminate\Http\Request;

class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kerjasama::with('kerjasama')->get();
        return view('admin.kerjasama.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kerjasama = JenisKerjasama::all();
        return view('admin.kerjasama.create', compact('jenis_kerjasama'));
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
            'instansi' => 'required',
            'jenis_kerjasama' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'file' => 'required|max:1024',
            'foto' => 'required|max:1024',
        ], [
            'file.max' => 'ukuran dokumen maksimal 1MB',
            'foto.max' => 'ukuran foto maksimal 1MB',
        ]);

        $data = Kerjasama::create([
            'instansi' => $request->instansi,
            'jenis_kerjasama' => $request->jenis_kerjasama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);
        // upload dokumen
        if ($request->hasFile('file')) {
            $filename = 'dokumen_' . time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move('dokumen/kerjasama', $filename);
            $data->file = $filename;
        }
        // upload logo
        if ($request->hasfile('foto')) {
            $filename = 'logo_' . time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images/logo_instansi', $filename);
            $data->foto = $filename;
        }
        $data->save();
        return redirect()->route('cooperation.index')->with('toast_success', 'Kerjasama Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}