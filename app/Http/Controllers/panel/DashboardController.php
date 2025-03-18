<?php

namespace App\Http\Controllers\panel;

use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', 'proprietaire')->latest()->get();
        $abonnement = Abonnement::where('status', 'active')->latest()->get();
        $users_active = $abonnement->where('ends_at', '>', now())->count();
        // dd($users_active);
        return view('admin.dashboard.index', compact('user', 'abonnement', 'users_active'));
    }
}
