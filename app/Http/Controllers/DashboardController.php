<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;

class DashboardController extends Controller
{
    public function index()
    {
        $alumni = Alumni::select(['id'])->count();
        $approved = Alumni::where('status', 1)->count();
        $pending = Alumni::where('status', 0)->count();
        return view("admin.Dashboard.Dashboard", compact(['alumni', 'approved', 'pending']));
    }
}
