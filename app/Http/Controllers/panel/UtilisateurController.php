<?php

namespace App\Http\Controllers\panel;

use App\Models\User;
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
        return view('admin.utilisateurs.show', compact('user'));
    }
}
