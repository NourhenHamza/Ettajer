<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez si l'utilisateur est connecté
        if (Auth::check()) {
            // Récupérez le nom du rôle de l'utilisateur
            $roleName = Auth::user()->role->name ?? null;

            // Vérifiez si l'utilisateur a le rôle "admin"
            if ($roleName === 'admin') {
                return $next($request);
            }
        }

        // Redirigez l'utilisateur vers la page d'accueil avec un message d'erreur
        return redirect()->route('login')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }
}
