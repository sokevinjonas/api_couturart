<?php

namespace App\Http\Controllers\panel;

use App\Models\User;
use App\Models\Caisse;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilisateurController extends Controller
{
    public function index()
    {   
        $users = User::where('role', 'proprietaire')->latest('created_at')->get();
        return view('admin.utilisateurs.index', compact('users'));
    }

    public function show(User $user)
    {
        $commandes = Commande::where('user_id', $user->id)->latest()->take(10)->get();
        $caisses = Caisse::where('user_id', $user->id)->latest()->take(10)->get();
        return view('admin.utilisateurs.show', compact('user', 'commandes', 'caisses'));
    }
}
