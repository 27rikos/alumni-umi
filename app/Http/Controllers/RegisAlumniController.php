<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Dosen;
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
        $dosens = Dosen::all();
        return view('User.Register.Create', compact(['prodi', 'peminatan', 'data', 'dosens']));
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
            "fakultas" => "required",
            "sempro" => "required",
            "semhas" => "required",
            "mejahijau" => "required",
            "yudisium" => "required",
            "pekerjaan" => "nullable",
            "judul" => "required",
            "tempat_lhr" => "required",
            "tanggal_lhr" => "required",
            "ayah" => "required",
            "ibu" => "required",
            "file" => "required|mimes:jpg,jpeg,png|max:2048",
            "ktp" => "required|mimes:jpg,jpeg,png|max:2048",
            "ijazah" => "required|mimes:jpg,jpeg,png|max:2048",
            "penguji1" => "required",
            "penguji2" => "required",
            "provinsi" => "required",
            "kota" => "required",
            "kecamatan" => "required",
            "kelurahan" => "required",
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
            "fakultas" => $request->fakultas,
            "sempro" => $request->sempro,
            "semhas" => $request->semhas,
            "mejahijau" => $request->mejahijau,
            "yudisium" => $request->yudisium,
            "tempat_lhr" => $request->tempat_lhr,
            "tanggal_lhr" => $request->tangga_lhr,
            "ayah" => $request->ayah,
            "nik" => $request->nik,
            "ibu" => $request->ibu,
            "judul" => $request->judul,
            "file" => $request->file,
            "penguji1" => $request->penguji1,
            "penguji2" => $request->penguji2,
            "provinsi" => $request->provinsi,
            "kota" => $request->kota,
            "kecamatan" => $request->kecamatan,
            "kelurahan" => $request->kelurahan,
        ]);
        // Handle file upload for 'file'
        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('images/alumni/', $fileName);
            $data->file = $fileName;
        }

        // Handle file upload for 'ktp'
        if ($request->hasFile('ktp')) {
            $ktpFileName = 'ktp_' . time() . '_' . $request->file('ktp')->getClientOriginalName();
            $request->file('ktp')->move('images/ktp/', $ktpFileName);
            $data->ktp = $ktpFileName;
        }

        // Handle file upload for 'ijazah'
        if ($request->hasFile('ijazah')) {
            $ijazahFileName = 'ijazah_' . time() . '_' . $request->file('ijazah')->getClientOriginalName();
            $request->file('ijazah')->move('images/ijazah/', $ijazahFileName);
            $data->ijazah = $ijazahFileName;
        }

        $data->save();
        return redirect()->route('user.home')->with('toast_info', 'Berhasil Daftar, admin akan melakukan validasi data yang anda daftarkan');
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
