<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Berita;

class LandingPageController extends Controller
{
    public function index()
    {
        $fikom = Alumni::where('falkutas', 'Falkutas Ilmu Komputer')->where('status', 1)->count();
        $fe = Alumni::where('falkutas', 'Falkutas Ekonomi')->where('status', 1)->count();
        $fp = Alumni::where('falkutas', 'Falkutas Pertanian')->where('status', 1)->count();
        $fs = Alumni::where('falkutas', 'Falkutas Sastra')->where('status', 1)->count();
        $fk = Alumni::where('falkutas', 'Falkutas Kedokteran')->where('status', 1)->count();
        $datas = Berita::latest()->paginate(3);
        return view('FrontPage.LandingPage', compact('datas', 'fikom', 'fe', 'fs', 'fp', 'fk'));
    }
}
