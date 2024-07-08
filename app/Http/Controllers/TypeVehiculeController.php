<?php

namespace App\Http\Controllers;

use App\Models\TypeVehicule;
use Illuminate\Http\Request;

class TypeVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeVehicules = TypeVehicule::all();
        return view('typevehicules.index', compact('typeVehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typevehicules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TypeVehicule::create($request->all());

        return redirect()->route('typevehicules.index')
            ->with('success', 'Type de véhicule créé avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeVehicule  $typeVehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeVehicule $typeVehicule)
    {
        return view('typevehicules.edit', compact('typeVehicule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeVehicule  $typeVehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeVehicule $typeVehicule)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $typeVehicule->update($request->all());

        return redirect()->route('typevehicules.index')
            ->with('success', 'Type de véhicule mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeVehicule  $typeVehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeVehicule $typeVehicule)
    {
        $typeVehicule->delete();

        return redirect()->route('typevehicules.index')
            ->with('success', 'Type de véhicule supprimé avec succès.');
    }
}
