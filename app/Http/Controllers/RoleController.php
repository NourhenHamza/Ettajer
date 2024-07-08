<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\ProfileRole;
use Illuminate\Support\Facades\DB;
use App\Helpers\ModelHelper;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
      $profileroles = ProfileRole::select('profile_name')->distinct()->get();
        return view('roles.create', compact('profileroles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string|max:255',
            'profile_name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
                'profile_name' => $request->profile_name,
            ]);

            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('roles.index')->with('error', 'Error creating role.');
        }
    }

    public function edit(Role $role)
    {
        $profileroles = ProfileRole::all();
        return view('roles.edit', compact('role', 'profileroles'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',
            'profile_name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $role->update([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
                'profile_name' => $request->profile_name,
            ]);

            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('roles.index')->with('error', 'Error updating role.');
        }
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
