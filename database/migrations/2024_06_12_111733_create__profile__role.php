<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('profile_role', function (Blueprint $table) {

            $table->unsignedBigInteger('profile_id');
            $table->string('profile_name');
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->boolean('can_create')->default(0);
            $table->boolean('can_view')->default(0);
            $table->boolean('can_update')->default(0);
            $table->boolean('can_delete')->default(0);
            $table->timestamps();

             $table->index('profile_name');

            // Foreign key constraint
            $table->foreign('model_id')
                  ->references('model_id')
                  ->on('model_has_permissions')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_role');
    }
};
