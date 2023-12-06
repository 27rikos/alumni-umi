<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class LandingPageController extends Controller
{
    public function index()
    {
        $datas = Berita::latest()->paginate(3);
        return view('FrontPage.LandingPage', compact('datas'));
    }
}
