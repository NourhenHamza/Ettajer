<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermissionColumnsToModelHasPermissionsTable extends Migration
{
  public function up()
  {
      Schema::table('model_has_permissions', function (Blueprint $table) {


          // Add the new columns

          $table->boolean('can_view')->default(0)->after('can_create');
          $table->boolean('can_update')->default(0)->after('can_view');
          $table->boolean('can_delete')->default(0)->after('can_update');



      });




  }



}
