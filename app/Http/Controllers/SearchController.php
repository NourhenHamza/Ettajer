<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Livreur;
use App\Models\Currency;
use App\Models\Customer; // Assurez-vous d'importer le modèle Customer correctement
use App\Models\TaxCategory;
use App\Models\TaxRate;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        switch ($category) {
            case 'nom':
            case 'prenom':
            case 'email':
            case 'telephone':
                $livreurs = Livreur::where($category, 'like', '%' . $query . '%')->get();
                return view('livreurs.index', [
                    'livreurs' => $livreurs,
                    'query' => $query,
                ]);

            case 'typeVehicule': // Utilisation de la relation typeVehicule pour les livreurs
                $livreurs = Livreur::whereHas('typeVehicule', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })->get();
                return view('livreurs.index', [
                    'livreurs' => $livreurs,
                    'query' => $query,
                ]);

            case 'currency':
                $currencies = Currency::where('name', 'like', '%' . $query . '%')
                    ->orWhere('iso_code', 'like', '%' . $query . '%')
                    ->orWhere('symbol', 'like', '%' . $query . '%')
                    ->get();
                return view('currencies.index', [
                    'currencies' => $currencies,
                    'query' => $query,
                ]);

            // Ajoutez d'autres cas pour les autres types de recherche
            // ...

            default:
                return redirect()->back()->with('error', 'Type de recherche invalide.');
        }
    }
}