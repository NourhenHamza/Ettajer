<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // Méthode pour afficher la liste des rôles
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }

    // Méthode pour afficher le formulaire de création de rôle
    public function create()
    {
        $permissions = Permission::all(); // Récupérer toutes les permissions
        return view('roles.create', compact('permissions'));
    }

    // Méthode pour enregistrer un nouveau rôle
    public function store(Request $request)
{
    // Valider les données de la requête
    $request->validate([
        'name' => 'required|string|max:255|unique:roles,name',
        'permissions' => 'nullable|array',
    ]);

    // Commencez une transaction de base de données
    DB::beginTransaction();

    try {
        // Créer un nouveau rôle
        $role = Role::create([
            'name' => $request->name,
        ]);

        // Associer les permissions sélectionnées au rôle
        if ($request->has('permissions')) {
            $permissions = collect($request->permissions)->map(function ($permission) {
                return intval($permission);
            });
            $role->permissions()->sync($permissions);
        }

        // Valider la transaction
        DB::commit();

        // Rediriger avec un message de succès
        return redirect()->route('roles.index')->with('success', 'Le rôle a été créé avec succès.');
    } catch (\Exception $e) {
        // En cas d'erreur, annuler la transaction
        DB::rollback();
        // Rediriger avec un message d'erreur
        return redirect()->route('roles.index')->with('error', 'Une erreur s\'est produite lors de la création du rôle.');
    }
}
    // Méthode pour afficher la vue de modification du rôle
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }
    public function show(Role $role)
    {
        $permissions = $role->permissions()->get();
        return view('roles.show', compact('role', 'permissions'));
    }

    // Méthode pour mettre à jour un rôle
    public function update(Request $request, Role $role)
    {
        // Valider les données de la requête
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Mettre à jour le nom du rôle
        $role->update([
            'name' => $request->name,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('roles.index')->with('success', 'Le rôle a été mis à jour avec succès.');
    }

    // Méthode pour supprimer un rôle
    public function destroy(Role $role)
    {
        // Supprimer le rôle
        $role->delete();

        // Rediriger avec un message de succès
        return redirect()->route('roles.index')->with('success', 'Le rôle a été supprimé avec succès.');
    }

}
