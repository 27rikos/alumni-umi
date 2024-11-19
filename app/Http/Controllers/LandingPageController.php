<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Kerjasama;

class LandingPageController extends Controller
{
    public function index()
    {
        $partner = Kerjasama::select('foto', 'instansi')->get();
        $fikom = Alumni::where('fakultas', 'Fakultas Ilmu Komputer')->where('status', 1)->count();
        $fe = Alumni::where('fakultas', 'Fakultas Ekonomi')->where('status', 1)->count();
        $fp = Alumni::where('fakultas', 'Fakultas Pertanian')->where('status', 1)->count();
        $fs = Alumni::where('fakultas', 'Fakultas Sastra')->where('status', 1)->count();
        $fk = Alumni::where('fakultas', 'Fakultas Kedokteran')->where('status', 1)->count();
        $datas = Berita::latest()->paginate(3);
        return view('FrontPage.LandingPage', compact('datas', 'fikom', 'fe', 'fs', 'fp', 'fk', 'partner'));
    }
}