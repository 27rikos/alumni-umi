<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ZipController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun;
        $fakultas = $request->fakultas;

        // Ambil data alumni berdasarkan tahun yudisium
        $alumniData = Alumni::whereYear('yudisium', $tahun)
            ->where('status', 1)
            ->where('fakultas', $fakultas)
            ->get();

        // Nama file zip
        $zipFileName = 'foto_wisudawan' . '_' . $fakultas . $tahun . '.zip';

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
        // Cek apakah file zip ada sebelum mencoba mendownloadnya
        if (!File::exists($zipPath)) {
            return redirect()->back()->with('error', 'Foto wisudawan yang Anda cari belum tersedia');
        }
        // Mengembalikan file zip untuk diunduh dan menghapusnya setelah pengunduhan
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
    public function fakultas_images(Request $request)
    {
        $tahun = $request->tahun;

        // Cari ID Prodi berdasarkan nama prodi user yang sedang login
        $id_prodi = Prodi::where('prodi', Auth()->user()->prodi)->value('id');

        // Jika ID Prodi tidak ditemukan, tambahkan handling error
        if (!$id_prodi) {
            abort(404, 'Program Studi tidak ditemukan');
        }
        // Ambil data alumni berdasarkan tahun yudisium
        $alumniData = Alumni::whereYear('yudisium', $tahun)
            ->where('status', 1)
            ->where('fakultas', auth()->user()->fakultas)
            ->where('prodi', $id_prodi)
            ->get();

        // Nama file zip
        $zipFileName = 'foto_wisudawan' . '_' . auth()->user()->fakultas . '_' . 'prodi_' . auth()->user()->prodi . $tahun . '.zip';

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

        // Cek apakah file zip ada sebelum mencoba mendownloadnya
        if (!File::exists($zipPath)) {
            return redirect()->back()->with('error', 'Foto wisudawan yang Anda cari belum tersedia');
        }

        // Mengembalikan file zip untuk diunduh dan menghapusnya setelah pengunduhan
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

}