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
        $alumni = Alumni::where('npm', auth()->user()->npm)->first();
        return view('User.Register.Create', compact(['prodi', 'peminatan', 'data', 'dosens', 'alumni']));
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
            "sempro" => "nullable",
            "semhas" => "nullable",
            "mejahijau" => "nullable",
            "yudisium" => "nullable",
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
            "pembimbing1" => "required",
            "pembimbing2" => "required",
            "provinsi" => "required",
            "kota" => "required",
            "kecamatan" => "required",
            "kelurahan" => "required",
            "gender" => "required",
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
            "penguji1" => $request->penguji1,
            "penguji2" => $request->penguji2,
            "pembimbing1" => $request->pembimbing1,
            "pembimbing2" => $request->pembimbing2,
            "provinsi" => $request->provinsi,
            "kota" => $request->kota,
            "kecamatan" => $request->kecamatan,
            "kelurahan" => $request->kelurahan,
            "gender" => $request->gender,
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
        $data = Alumni::findOrFail($id);

        // Simpan data yang akan diupdate ke dalam array
        $updateData = $request->only([
            'npm', 'nama', 'stambuk', 'peminatan', 'prodi',
            'sempro', 'semhas', 'mejahijau', 'yudisium', 'fakultas', 'judul', 'tanggal_lhr', 'tempat_lhr',
            'ayah', 'ibu', 'penguji1', 'penguji2', 'pembimbing1', 'pembimbing2', 'nik', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'gender',
        ]);

        // Cek apakah file baru diupload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file foto lama jika ada
            if ($data->file) {
                $oldPhotoPath = public_path('images/alumni/' . $data->file);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Simpan file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/alumni'), $fileName);

            // Tambahkan nama file baru ke data update
            $updateData['file'] = $fileName;
        }

        // Handle file upload for 'ktp'
        if ($request->hasFile('ktp') && $request->file('ktp')->isValid()) {
            // Hapus file KTP lama jika ada
            if ($data->ktp) {
                $oldKtpPath = public_path('images/ktp/' . $data->ktp);
                if (file_exists($oldKtpPath)) {
                    unlink($oldKtpPath);
                }
            }

            // Simpan file KTP baru
            $ktpFile = $request->file('ktp');
            $ktpFileName = 'ktp_' . time() . '_' . $ktpFile->getClientOriginalName();
            $ktpFile->move(public_path('images/ktp'), $ktpFileName);

            // Tambahkan nama file KTP baru ke data update
            $updateData['ktp'] = $ktpFileName;
        }

        // Handle file upload for 'ijazah'
        if ($request->hasFile('ijazah') && $request->file('ijazah')->isValid()) {
            // Hapus file Ijazah lama jika ada
            if ($data->ijazah) {
                $oldIjazahPath = public_path('images/ijazah/' . $data->ijazah);
                if (file_exists($oldIjazahPath)) {
                    unlink($oldIjazahPath);
                }
            }

            // Simpan file Ijazah baru
            $ijazahFile = $request->file('ijazah');
            $ijazahFileName = 'ijazah_' . time() . '_' . $ijazahFile->getClientOriginalName();
            $ijazahFile->move(public_path('images/ijazah'), $ijazahFileName);

            // Tambahkan nama file Ijazah baru ke data update
            $updateData['ijazah'] = $ijazahFileName;
        }

        // Update data user
        $data->update($updateData);
        return redirect()->route('user.home')->with('toast_info', 'Perubahan berhasil disimpan. Admin akan memvalidasi data yang telah Anda ubah');
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
