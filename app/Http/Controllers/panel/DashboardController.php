<?php

namespace App\Http\Controllers\panel;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $user = User::where('role', 'proprietaire')->latest()->get();
        $last_user =  User::where('role', 'proprietaire')
                    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->latest()
                    ->get();
        $abonnement = Abonnement::where('status', 'active')->latest()->get();
        $users_active = Abonnement::where('ends_at', '>', now())->count();
        // dd($users_active);
        return view('admin.dashboard.index', compact('user', 'abonnement', 'users_active', 'last_user'));
    }
}
