<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeVehiculesTable extends Migration
{
    public function up()
    {
        Schema::create('type_vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ajoute une colonne 'name' pour le type de véhicule
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_vehicules');
    }
}