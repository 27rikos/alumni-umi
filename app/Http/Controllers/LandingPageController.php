<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kerjasama;
use Illuminate\Cache\RateLimiting\Limit;

class LandingPageController extends Controller
{
    public function index()
    {
        $partner = Kerjasama::select('foto', 'instansi')->get();
        $datas   = Berita::with('kategori')->latest()->limit(6)->get();
        return view('FrontPage.LandingPage', compact('datas', 'partner'));
    }
}