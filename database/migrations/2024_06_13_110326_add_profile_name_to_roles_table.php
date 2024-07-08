<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileNameToRolesTable extends Migration
{
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            // Add the profile_name column after guard_name
            $table->string('profile_name')->after('guard_name');

            // Add foreign key constraint
            $table->foreign('profile_name')->references('profile_name')->on('profile_role')
                  ->onDelete('cascade'); // Adjust onDelete action as necessary
        });
    }

    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['profile_name']);
            // Drop the profile_name column
            $table->dropColumn('profile_name');
        });
    }
}
