<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Peminatan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class RegisAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::where('name', auth()->user()->name)->first();
        $peminatan = Peminatan::all();
        $prodi = Prodi::all();
        return view('User.Register.Create', compact(['prodi', 'peminatan', 'data']));
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
            "npm" => "required|unique:alumnis",
            "nama" => "required",
            "stambuk" => "required",
            "peminatan" => "required",
            "prodi" => "required",
            "thn_lulus" => "required",
            "sempro" => "required",
            "semhas" => "required",
            "mejahijau" => "required",
            "yudisium" => "required",
            "pekerjaan" => "nullable",
            "judul" => "required",
            "file" => "required|mimes:jpg,jpeg,png|max:2048",
        ], messages: [
            'npm.unique' => 'NIP sudah digunakan',
            'file.mimes' => 'Format file foto harus jpg,jpeg,png',
        ]);
        $data = Alumni::create([
            "npm" => $request->npm,
            "nama" => $request->nama,
            "stambuk" => $request->stambuk,
            "peminatan" => $request->peminatan,
            "prodi" => $request->prodi,
            "thn_lulus" => $request->thn_lulus,
            "sempro" => $request->sempro,
            "semhas" => $request->semhas,
            "mejahijau" => $request->mejahijau,
            "yudisium" => $request->yudisium,
            "pekerjaan" => $request->pekerjaan,
            "judul" => $request->judul,
            "file" => $request->file,
        ]);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/alumni/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('Daftar.create')->with('toast_info', 'Berhasil Daftar, admin akan melakukan validasi data yang anda daftarkan');
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
