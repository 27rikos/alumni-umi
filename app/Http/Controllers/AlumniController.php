<?php

namespace App\Http\Controllers;

use App\Imports\AlumniImport;
use App\Models\Alumni;
use App\Models\Dosen;
use App\Models\Peminatan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = Alumni::with('minat', 'prodis', 'dosenpenguji1', 'dosenpenguji2', 'dosenpembimbing1', 'dosenpembimbing2')->get();
        return view('admin.Alumni.Index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosens = Dosen::select('id', 'nama')->get();
        $peminatan = Peminatan::all();
        $prodi = Prodi::all();
        return view("admin.Alumni.Create", compact(['prodi', 'peminatan', 'dosens']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            "npm" => "required|unique:alumnis",
            "nama" => "required",
            "stambuk" => "required",
            "peminatan" => "required",
            "prodi" => "required",
            "thn_lulus" => "nullable",
            "sempro" => "nullable",
            "semhas" => "nullable",
            "mejahijau" => "nullable",
            "yudisium" => "nullable",
            "fakultas" => "required",
            "judul" => "required",
            "no_alumni" => "nullable",
            "tempat_lhr" => "required",
            "tanggal_lhr" => "required",
            "ayah" => "required",
            "ibu" => "required",
            "ipk" => "nullable",
            "nik" => "required",
            "gender" => "required",
            "file" => "mimes:jpg,jpeg,png|max:2048",
            "ktp" => "mimes:jpg,jpeg,png|max:2048",
            "ijazah" => "mimes:jpg,jpeg,png|max:2048",
            "penguji1" => "required",
            "penguji2" => "required",
            "pembimbing1" => "required",
            "pembimbing2" => "required",
            "provinsi" => "required",
            "kota" => "required",
            "kecamatan" => "required",
            "kelurahan" => "required",
        ], [
            'npm.unique' => 'NPM sudah digunakan',
            'file.mimes' => 'Format file foto harus jpg,jpeg,png',
            'ktp.mimes' => 'Format file KTP harus jpg,jpeg,png',
            'ijazah.mimes' => 'Format file Ijazah harus jpg,jpeg,png',
            'penguji1.required' => 'Nama penguji 1 harus diisi', // Custom error message for penguji1
            'penguji2.required' => 'Nama penguji 2 harus diisi', // Custom error message for penguji2
        ]);

        // Create new Alumni record
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
            "judul" => $request->judul,
            "fakultas" => $request->fakultas,
            "no_alumni" => $request->no_alumni,
            "tempat_lhr" => $request->tempat_lhr,
            "tanggal_lhr" => $request->tanggal_lhr,
            "nik" => $request->nik,
            "ayah" => $request->ayah,
            "ibu" => $request->ibu,
            "ipk" => $request->ipk,
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

        return redirect()->route('alumni.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dosens = Dosen::select('id', 'nama')->get();
        $prodi = Prodi::all();
        $peminatan = Peminatan::all();
        $find = Alumni::where('id', $id)->with('prodis', 'minat', 'dosenpenguji1', 'dosenpenguji2')->first();
        return view('admin.Alumni.Edit', compact(['find', 'prodi', 'peminatan', 'dosens']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Alumni::findOrFail($id);

        // Simpan data yang akan diupdate ke dalam array
        $updateData = $request->only([
            'npm', 'nama', 'stambuk', 'peminatan', 'prodi',
            'thn_lulus', 'sempro', 'semhas', 'mejahijau',
            'yudisium', 'fakultas', 'judul', 'no_alumni', 'ipk', 'tanggal_lhr', 'tempat_lhr',
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

        return redirect()->route('alumni.index')->with('toast_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the alumni record by its ID
        $data = Alumni::findOrFail($id);

        // Define the paths for the files
        $filePaths = [
            'file' => public_path('images/alumni/' . $data->file),
            'ijazah' => public_path('images/ijazah/' . $data->ijazah),
            'ktp' => public_path('images/ktp/' . $data->ktp),
        ];

        // Loop through each file path and delete the file if it exists
        foreach ($filePaths as $key => $path) {
            if ($data->$key && file_exists($path)) {
                // Attempt to delete the file from the directory
                if (!unlink($path)) {
                    // If file deletion fails, return with an error message
                    return redirect()->route('alumni.index')->with('toast_error', "Error deleting the {$key} file at {$path}!");
                }
            } else {
                // If file does not exist, log the message
                Log::warning("File {$path} does not exist.");
            }
        }

        // Delete the alumni record
        $data->delete();

        // Redirect with a success message
        return redirect()->route('alumni.index')->with('toast_success', 'Data berhasil dihapus');
    }

    public function imports(Request $request)
    {
        // Validate the uploaded file
        $this->validate($request, rules: [
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ],
            messages: [
                'file.required' => 'file belum di upload',
                'file.mimes' => 'format file harus Excel',
                'file.max' => 'Ukuran Maksimal file 2MB',

            ]
        );

        // Handle the uploaded file
        $file = $request->file('file');

        // Move the file to a temporary location (optional)
        $filePath = $file->storeAs('temp', $file->getClientOriginalName());

        // Import the data from the Excel file
        Excel::import(new AlumniImport, $filePath);

        return redirect()->back()->with('toast_success', 'Alumni data imported successfully.');
    }
}