<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }

        if (Auth::user()->role === 'admin' || Auth::user()->role === 'moderateur') {
            // Si l'utilisateur a le rôle requis, continuez
            return $next($request);
        }

        // Si l'utilisateur est connecté mais n'a pas les bons rôles, affichez une erreur 403
        abort(403, 'Accès interdit.');
    }
}
