<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function admin()
    {
        // Group by stambuk and count the number of alumni in each group
        $alumniData = Alumni::where('status', 1)->select('stambuk', DB::raw('count(*) as total'))
            ->groupBy('stambuk')
            ->get();
        $mahasiswa = Mahasiswa::count();
        // Prepare data for the chart
        $categories = $alumniData->pluck('stambuk'); // List of stambuk
        $data = $alumniData->pluck('total'); // Count of alumni in each stambu
        $alumni = Alumni::select(['id'])->count();
        $pending = Alumni::where('status', 0)->count();
        $user = User::count();

        // Ambil data mahasiswa berdasarkan kota dan hitung jumlahnya
        $data_mahasiswa = Mahasiswa::select('kota', 'tahun_masuk', DB::raw('count(*) as total'))
            ->groupBy('kota', 'tahun_masuk')
            ->get();

        // Format data_mahasiswa untuk ApexCharts
        $labels = $data_mahasiswa->pluck('kota'); // Kota-kota
        $years = $data_mahasiswa->pluck('tahun_masuk'); // Tahun masuk
        $values = $data_mahasiswa->pluck('total'); // Jumlah mahasiswa per kota dan tahun masuk

        // Mengambil data jumlah mahasiswa berdasarkan provinsi
        $provinces = Mahasiswa::select('provinsi', 'tahun_masuk', DB::raw('count(*) as jumlah'))
            ->groupBy('provinsi', 'tahun_masuk')
            ->get();

        // Menyiapkan data untuk chart
        $province_names = $provinces->pluck('provinsi')->toArray(); // Nama-nama provinsi
        $province_years = $provinces->pluck('tahun_masuk')->toArray(); // Tahun masuk
        $province_values = $provinces->pluck('jumlah')->toArray(); // Jumlah mahasiswa per provinsi dan tahun masuk

        // Mengambil jumlah mahasiswa per tahun_masuk
        $mahasiwa_pertahun_masuk = Mahasiswa::selectRaw('tahun_masuk, COUNT(*) as jumlah')
            ->groupBy('tahun_masuk')
            ->orderBy('tahun_masuk', 'asc') // Urutkan berdasarkan tahun
            ->get();

        // Menyediakan mahasiwa_pertahun_masuk ke view
        $yearstahunmasuk = $mahasiwa_pertahun_masuk->pluck('tahun_masuk');
        $countstahunmasuk = $mahasiwa_pertahun_masuk->pluck('jumlah');

        return view('admin.Dashboard.Dashboard', compact([
            'labels', 'years', 'values', 'mahasiswa', 'alumni', 'pending', 'user',
            'categories', 'data', 'province_names', 'province_years', 'province_values',
            'yearstahunmasuk', 'countstahunmasuk',
        ]));
    }

    public function user()
    {
        $data = Alumni::with('minat', 'prodis', 'dosenpenguji1', 'dosenpenguji2', 'dosenpembimbing1', 'dosenpembimbing2')->where('status', 1)->where(function ($query) {
            $query->where('npm', Auth()->user()->npm);
        })->get();
        return view('User.Data.Data', compact(['data']));
    }

    public function falkutas()
    {
        $userFaculty = Auth::user()->fakultas; // Get logged-in user's faculty

        $data = Alumni::where('fakultas', $userFaculty)->where('status', 1)->select('stambuk', DB::raw('count(*) as total'))
            ->groupBy('stambuk')
            ->pluck('total', 'stambuk');

        $categories = $data->keys();
        $values = $data->values();

        $alumni = Alumni::select(['id'])->where('fakultas', auth()->user()->fakultas)->count();
        $pending = Alumni::where('status', 0)->where('fakultas', auth()->user()->fakultas)->count();
        $approved = Alumni::where('status', 1)->where('fakultas', auth()->user()->fakultas)->count();

        // Ambil data mahasiswa berdasarkan kota dan hitung jumlahnya
        $data_mahasiswa = Mahasiswa::select('kota', 'tahun_masuk', DB::raw('count(*) as total'))
            ->groupBy('kota', 'tahun_masuk')
            ->where('fakultas', $userFaculty)
            ->get();

        // Format data_mahasiswa untuk ApexCharts
        $city_labels = $data_mahasiswa->pluck('kota'); // Kota-kota
        $city_values = $data_mahasiswa->pluck('total'); // Jumlah mahasiswa per kota dan tahun masuk

        // Mengambil data jumlah mahasiswa berdasarkan provinsi
        $provinces = Mahasiswa::select('provinsi', 'tahun_masuk', DB::raw('count(*) as jumlah'))
            ->groupBy('provinsi', 'tahun_masuk')
            ->where('fakultas', $userFaculty)
            ->get();

        // Menyiapkan data untuk chart
        $province_names = $provinces->pluck('provinsi')->toArray(); // Nama-nama provinsi
        $province_values = $provinces->pluck('jumlah')->toArray(); // Jumlah mahasiswa per provinsi dan tahun masuk

        return view('falkutas.dashboard.index', compact('city_labels', 'city_values', 'province_names', 'province_values', 'alumni', 'pending', 'approved', 'categories', 'values'));
    }

}
