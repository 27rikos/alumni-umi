<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $alumni = Alumni::select(['id'])->count();
        $approved = Alumni::where('status', 1)->count();
        $pending = Alumni::where('status', 0)->count();
        $user = User::count();
        return view("admin.Dashboard.Dashboard", compact(['user', 'alumni', 'approved', 'pending']));
    }
}