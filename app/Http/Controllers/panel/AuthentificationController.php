<?php

namespace App\Http\Controllers\panel;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{
    public function create()
    {
        return view('admin.authentification.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // dd($credentials);
        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin' || $user->role === 'moderateur') {
                $request->session()->regenerate();
                // dd("Je suis arrive");

                // Redirection vers le tableau de bord
                return redirect()->route('utilisateurs');
            }

            Auth::logout();
            return back()->withErrors([
                'role' => 'Vous n\'avez pas l\'autorisation d\'accéder à cette section.',
            ])->onlyInput('email');
        }

        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'Cette adresse mail n\'existe pas, ressayez.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'password' => 'Le mot de passe que vous avez saisi est incorrect.',
        ])->onlyInput('email');
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
