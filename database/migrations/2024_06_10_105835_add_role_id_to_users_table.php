<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add a column role_id of type unsigned big integer
            $table->unsignedBigInteger('role_id')->nullable()->after('name');

            // Add a foreign key constraint to link role_id to id in the roles table
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint and the role_id column
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }



};
