<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
//use App\Models\MedicalType;



class LogController extends Controller
{


    /*public function deconnexion()
    {
        Auth::logout(); // Déconnexion de l'utilisateur
        return redirect()->route('accueil'); // Redirection vers la page de connexion
    }*/


    public function afficherFormulaireConnexion()
    {
        return view('auth.connexion');
    }
    public function connexion(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    // Tentative d'authentification
    if (Auth::attempt($credentials)) {
        // Authentification réussie
        $user = Auth::user();

        // Récupération du nom du rôle de l'utilisateur
        $userRoleName = $user->role->name;

       /*  // Si l'utilisateur est un patient, rediriger vers la route 'accueil'
        if ($userRoleName === 'patient') {
            return redirect()->route('Patientdashboard'); // Redirection vers la page d'accueil spécifique aux patients
        }

        // Vérification si le nom du rôle de l'utilisateur correspond à un nom dans la table medicaltypes
        $medicalType = MedicalType::where('name', $userRoleName)->first();

        if ($medicalType || in_array($userRoleName, MedicalType::pluck('name')->toArray())) {
            return redirect()->route('dashboard'); // Redirection vers le tableau de bord médical
        }

        // Conditions spécifiques pour d'autres rôles comme 'laboratory' ou 'pharmacy'
        if ($userRoleName === 'laboratory' || $userRoleName === 'pharmacy') {
            return redirect()->route('dashboard'); // Redirection vers le tableau de bord approprié
        } */
        if ($userRoleName === 'admin' ) {
          return redirect()->route('login'); // Redirection vers le tableau de bord approprié
      }

    }

    // Redirection en cas d'échec d'authentification
    return redirect()->route('connexion')->with('error', 'Email ou mot de passe incorrect.');
}

    }
