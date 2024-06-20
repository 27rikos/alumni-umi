<?php

namespace App\Http\Controllers;

use App\Models\Alumni;

class FalkutasController extends Controller
{
    public function index()
    {
        $data = Alumni::with('prodis', 'minat')->where(function ($query) {
            $query->where('falkutas', Auth()->user()->name);
        })->get();
        return view("falkutas.main.index", compact("data"));

    }

}
