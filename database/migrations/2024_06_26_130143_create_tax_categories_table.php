<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('tax_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->enum('type', ['fix', 'pourcentage'])->default('pourcentage');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tax_categories');
    }
}
