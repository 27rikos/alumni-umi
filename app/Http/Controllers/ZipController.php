<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ZipController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun;

        // Ambil data alumni berdasarkan tahun yudisium
        $alumniData = Alumni::whereYear('yudisium', $tahun)->where('status', 1)->get();

        // Nama file zip
        $zipFileName = 'foto_wisudawan' . $tahun . '.zip';

        // Lokasi penyimpanan di direktori public
        $zipPath = public_path($zipFileName);

        // Hapus file zip lama jika ada
        if (File::exists($zipPath)) {
            File::delete($zipPath);
        }

        // Buat objek ZipArchive
        $zip = new ZipArchive;

        // Buat file zip
        if ($zip->open($zipPath, ZipArchive::CREATE) === true) {
            foreach ($alumniData as $alumni) {
                // Cek apakah file gambar alumni ada di direktori
                if ($alumni->file && File::exists(public_path("images/alumni/{$alumni->file}"))) {
                    // Tambahkan file gambar ke dalam zip
                    $filePath = public_path("images/alumni/{$alumni->file}");
                    $zip->addFile($filePath, "images/alumni/{$alumni->file}");
                }
            }
            $zip->close();
        } else {
            return response()->json(['error' => 'Could not create zip file'], 500);
        }

        // Mengembalikan file zip untuk diunduh dan menghapusnya setelah pengunduhan
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
