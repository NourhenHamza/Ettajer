<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default('individual'); // Champ de type string pour le type de client
            $table->string('email')->nullable();
            $table->string('phone', 22)->nullable();
            $table->string('firstname')->nullable()->comment('First name');
            $table->string('lastname')->nullable()->comment('Last name');
            $table->string('company_name')->nullable();
            $table->string('tax_nr', 17)->nullable()->comment('Tax/VAT Identification Number');
            $table->string('registration_nr')->nullable()->comment('Company/Trade Registration Number');
            $table->string('website')->nullable()->comment('Website URL'); // Ajout du champ website
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('customers');
    }
}
