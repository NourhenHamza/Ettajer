<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ModelHelper;


class AssignPermissionsToAdmin extends Seeder
{
    public function run()
    {
        //Creation Profile Role admin

        $models = ModelHelper::getAllModels();
        $profileId = 1;

        foreach ($models as $model) {

            // Fetch model_id from the model_has_permissions table
            $modelData = DB::table('model_has_permissions')
                ->where('model_type', $model)
                ->select('model_id')
                ->first();

            if ($modelData) {
                DB::table('profile_role')->insert([
                    'profile_id' => $profileId,
                    'profile_name' => 'admin',
                    'model_type' => $model,
                    'model_id' => $modelData->model_id,
                    'can_create' => 1,
                    'can_view' => 1,
                    'can_update' => 1,
                    'can_delete' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            $profileId++;
        }


      //role for admin

      DB::table('roles')->insert([
        'id' => 1,
        'name' => 'admin',
        'guard_name' => 'web',
        'profile_name' => 'admin',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);



    // admin  user

    DB::table('users')->insert([
      'name' => 'Admin User',
      'email' => 'admin@example.com',
      'email_verified_at' => Carbon::now(),
      'password' => Hash::make('admin'),
      'role_id' => 1,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
      'two_factor_secret' => null,
      'two_factor_recovery_codes' => null,
      'two_factor_confirmed_at' => null,
      'remember_token' => null,
      'current_team_id' => null,
      'profile_photo_path' => null,

    ]);

}
}