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
        $jenis_kerjasama = JenisKerjasama::all();
        $data = Kerjasama::findOrFail($id);
        return view('admin.kerjasama.edit', compact('data', 'jenis_kerjasama'));
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
        $data = Kerjasama::findOrFail($id);

        $updateData = $request->all();

        // Cek apakah file baru diupload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file lama jika ada
            if ($data->file) {
                $oldFilePath = public_path('dokumen/kerjasama/' . $data->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Simpan file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('dokumen/kerjasama'), $fileName);

            // Tambahkan nama file baru ke data update
            $updateData['file'] = $fileName;
        }

        // Handle file upload untuk 'foto' (logo instansi)
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Hapus file logo lama jika ada
            if ($data->foto) {
                $oldLogoPath = public_path('images/logo_instansi/' . $data->foto);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }

            // Simpan file logo baru
            $fotoFile = $request->file('foto');
            $fileName = 'logo_' . time() . '_' . $fotoFile->getClientOriginalName();
            $fotoFile->move(public_path('images/logo_instansi'), $fileName);

            // Tambahkan nama file logo baru ke data update
            $updateData['foto'] = $fileName;
        }

        // Update data lainnya
        $data->update($updateData);

        // Redirect dengan pesan sukses
        return redirect()->route('cooperation.index')->with('toast_success', 'Kerjasama Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $data = Kerjasama::findOrFail($id);

        // Hapus file yang terkait dengan 'file'
        if ($data->file) {
            $oldFilePath = public_path('dokumen/kerjasama/' . $data->file);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Hapus file yang terkait dengan 'foto' (logo instansi)
        if ($data->foto) {
            $oldLogoPath = public_path('images/logo_instansi/' . $data->foto);
            if (file_exists($oldLogoPath)) {
                unlink($oldLogoPath);
            }
        }

        // Hapus data dari database
        $data->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('cooperation.index')->with('toast_success', 'Kerjasama Berhasil Dihapus');
    }

}
