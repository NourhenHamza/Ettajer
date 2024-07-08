<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileRole;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Helpers\ModelHelper;

class ProfileRoleController extends Controller
{
    public function index()
    {
        $profileRoles = ProfileRole::all();
        return view('profileroles.index', compact('profileRoles'));
    }

    public function create()
    {
        $models = ModelHelper::getAllModels();
        $permissions = Permission::all();
        return view('profileroles.create', compact('models', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_name' => 'required|string',
            'permissions' => 'nullable|array',
        ]);

        DB::beginTransaction();

        try {
            $profileId = ProfileRole::max('profile_id') + 1; // Increment the profile_id

            if ($request->has('permissions')) {
                foreach ($request->permissions as $model => $permissionsArray) {

                    // Construct the full model type name
                    $modelType = 'App\\Models\\' . $model;

                    // Fetch model_id and model_type from the model_has_permissions table
                    $modelData = DB::table('model_has_permissions')
                        ->where('model_type', $modelType)
                        ->select('model_id', 'model_type')
                        ->first();

                    if ($modelData) {
                        $profileRole = ProfileRole::create([
                            'profile_id' => $profileId,
                            'profile_name' => $request->profile_name,
                            'model_id' => $modelData->model_id,
                            'model_type' => $modelData->model_type,
                            'can_create' => in_array('create', $permissionsArray) ? 1 : 0,
                            'can_view' => in_array('view', $permissionsArray) ? 1 : 0,
                            'can_update' => in_array('update', $permissionsArray) ? 1 : 0,
                            'can_delete' => in_array('delete', $permissionsArray) ? 1 : 0,
                        ]); $profileId++ ;
                    } else {
                        \Log::error('Model data not found for model: ' . $modelType);
                    }
                }
            }
            DB::commit();
            return redirect()->route('profileroles.index')->with('success', 'Profile role created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error creating profile role: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while saving the profile role.']);
        }
    }

    public function edit(ProfileRole $profileRole)
    {
        $models = ModelHelper::getAllModels();
        $permissions = Permission::all();
        return view('profileroles.edit', compact('profileRole', 'models', 'permissions'));
    }



    public function destroy(ProfileRole $profileRole)
    {
        $profileRole->delete();
        return redirect()->route('profileroles.index')->with('success', 'Profile role deleted successfully.');
    }
}
