<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // Group by stambuk and count the number of alumni in each group
        $alumniData = Alumni::where('status', 1)->select('stambuk', DB::raw('count(*) as total'))
            ->groupBy('stambuk')
            ->get();

// Prepare data for the chart
        $categories = $alumniData->pluck('stambuk'); // List of stambuk
        $data = $alumniData->pluck('total'); // Count of alumni in each stambu
        $alumni = Alumni::select(['id'])->count();
        $approved = Alumni::where('status', 1)->count();
        $pending = Alumni::where('status', 0)->count();
        $user = User::count();
        return view('admin.Dashboard.Dashboard', compact(['alumni', 'approved', 'pending', 'user', 'categories', 'data']));
    }

    public function user()
    {
        $data = Alumni::with('minat', 'prodis', 'dosenpenguji1', 'dosenpenguji2')->where('status', 1)->where(function ($query) {
            $query->where('npm', Auth()->user()->npm);
        })->get();
        return view('User.Data.Data', compact(['data']));
    }
    public function falkutas()
    {
        $userFaculty = Auth::user()->fakultas; // Get logged-in user's faculty

        $data = Alumni::where('fakultas', $userFaculty)->where('status', 1)->select('stambuk', DB::raw('count(*) as total'))
            ->groupBy('stambuk')
            ->pluck('total', 'stambuk');

        $categories = $data->keys();
        $values = $data->values();

        $alumni = Alumni::select(['id'])->where('fakultas', auth()->user()->fakultas)->count();
        $pending = Alumni::where('status', 0)->where('fakultas', auth()->user()->fakultas)->count();
        $approved = Alumni::where('status', 1)->where('fakultas', auth()->user()->fakultas)->count();
        return view('falkutas.dashboard.index', compact('alumni', 'pending', 'approved', 'categories', 'values'));
    }
}