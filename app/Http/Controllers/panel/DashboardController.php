<?php

namespace App\Http\Controllers\panel;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', 'proprietaire')->latest()->get();
        return view('admin.dashboard.index', compact('user'));
    }
}
