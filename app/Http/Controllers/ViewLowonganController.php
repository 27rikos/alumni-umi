<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewLowonganController extends Controller
{
    public function index()
    {
        return view('FrontPage.Lowongan');
    }
}
