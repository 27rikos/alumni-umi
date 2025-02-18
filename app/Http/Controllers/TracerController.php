<?php

namespace App\Http\Controllers;

class TracerController extends Controller
{
    public function index()
    {
        return view('admin.tracer.index');
    }

    public function create()
    {
        return view('admin.tracer.create');
    }
}
