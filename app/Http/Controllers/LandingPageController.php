<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Berita;

class LandingPageController extends Controller
{
    public function index()
    {
        $fikom = Alumni::where('fakultas', 'Falkutas Ilmu Komputer')->where('status', 1)->count();
        $fe = Alumni::where('fakultas', 'Falkutas Ekonomi')->where('status', 1)->count();
        $fp = Alumni::where('fakultas', 'Falkutas Pertanian')->where('status', 1)->count();
        $fs = Alumni::where('fakultas', 'Falkutas Sastra')->where('status', 1)->count();
        $fk = Alumni::where('fakultas', 'Falkutas Kedokteran')->where('status', 1)->count();
        $datas = Berita::latest()->paginate(3);
        return view('FrontPage.LandingPage', compact('datas', 'fikom', 'fe', 'fs', 'fp', 'fk'));
    }
}