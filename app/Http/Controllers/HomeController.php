<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\User;

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
        $alumni = Alumni::select(['id'])->count();
        $approved = Alumni::where('status', 1)->count();
        $pending = Alumni::where('status', 0)->count();
        $user = User::where('role', 0)->count();
        return view('admin.Dashboard.Dashboard', compact(['alumni', 'approved', 'pending', 'user']));
    }

    public function user()
    {
        $data = Alumni::with('minat', 'prodis')->where('status', 1)->where(function ($query) {
            $query->where('npm', Auth()->user()->npm);
        })->get();
        return view('User.Data.Data', compact(['data']));
    }
}
