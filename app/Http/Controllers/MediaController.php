<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Video;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function foto()
    {
        $data = Gallery::all();
        return view('FrontPage.Foto', compact(['data']));
    }
    public function video()
    {
        $data = Video::all();
        return view('FrontPage.Video', compact(['data']));
    }
}
