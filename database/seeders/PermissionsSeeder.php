<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Helpers\ModelHelper;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create the four CRUD permissions
        $permissions = ['create', 'view', 'update', 'delete'];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }



            // Ensure the permissions exist and get their IDs
            $permissionIds = Permission::pluck('id')->toArray();



            // Assign the remaining permission IDs to the respective columns
            $createPermissionId = $permissionIds[0];
            $viewPermissionId = $permissionIds[1] ?? null;
            $updatePermissionId = $permissionIds[2] ?? null;
            $deletePermissionId = $permissionIds[3] ?? null;



            // Get all models
            $models = ModelHelper::getAllModels();
            $modelId = 1;
            foreach ($models as $model) {

                DB::table('model_has_permissions')->insert([

                   'can_create' => $createPermissionId,
                    'model_type' => $model,
                    'model_id'=> $modelId,
                    'can_view' => $viewPermissionId,
                    'can_update' => $updatePermissionId,
                    'can_delete' => $deletePermissionId,

                ]);
                $modelId++;
            }
        }


            }