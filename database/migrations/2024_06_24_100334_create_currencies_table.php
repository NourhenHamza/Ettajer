<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iso_code');
            $table->decimal('exchange_rate', 10, 2)->nullable();
            $table->integer('decimals');
            $table->enum('status', ['active', 'inactive']);
            $table->string('symbol');
            $table->boolean('default_currency')->default(false); // Nouveau champ pour indiquer la devise par défaut
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
