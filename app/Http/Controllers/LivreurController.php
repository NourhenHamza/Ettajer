<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use App\Models\TypeVehicule;
use App\Models\DeliveryRoute;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    public function index()
    {
        $livreurs = Livreur::with(['typeVehicule', 'deliveryRoute'])->get();
        return view('livreurs.index', compact('livreurs'));
    }

    public function create()
    {
        // Charge tous les types de véhicules et routes de livraison disponibles
        $typeVehicules = TypeVehicule::all();
        $deliveryRoutes = DeliveryRoute::all();
        return view('livreurs.create', compact('typeVehicules', 'deliveryRoutes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:livreurs',
            'telephone' => 'required|string|max:20',
            'type_vehicule_id' => 'required|exists:type_vehicules,id',
            'delivery_route_id' => 'required|exists:delivery_routes,id',
        ]);

        Livreur::create($validatedData);

        return redirect()->route('livreurs.index')->with('success', 'Livreur créé avec succès.');
    }

    public function show(Livreur $livreur)
    {
        return view('livreurs.show', compact('livreur'));
    }

    public function edit(Livreur $livreur)
    {
        // Charge tous les types de véhicules et routes de livraison disponibles
        $typeVehicules = TypeVehicule::all();
        $deliveryRoutes = DeliveryRoute::all();
        return view('livreurs.edit', compact('livreur', 'typeVehicules', 'deliveryRoutes'));
    }

    public function update(Request $request, Livreur $livreur)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:livreurs,email,' . $livreur->id,
            'telephone' => 'required|string|max:20',
            'type_vehicule_id' => 'required|exists:type_vehicules,id',
            'delivery_route_id' => 'required|exists:delivery_routes,id',
        ]);

        $livreur->update($validatedData);

        return redirect()->route('livreurs.index')->with('success', 'Livreur mis à jour avec succès.');
    }

    public function destroy(Livreur $livreur)
    {
        $livreur->delete();

        return redirect()->route('livreurs.index')->with('success', 'Livreur supprimé avec succès.');
    }

    public function updateList(Request $request)
    {
        $pickupCity = $request->input('pickup_city');
        $deliveryCity = $request->input('delivery_city');

        // Exemple de logique pour récupérer les livreurs en fonction des villes
        $livreurs = Livreur::whereHas('routes', function ($query) use ($pickupCity, $deliveryCity) {
            $query->where('city', $pickupCity)
                  ->orWhere('city', $deliveryCity);
        })->get();

        return response()->json(['livreurs' => $livreurs]);
    }
}
