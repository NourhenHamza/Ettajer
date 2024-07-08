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
        Schema::table('currencies', function (Blueprint $table) {
            $table->boolean('is_default')->default(false)->after('status'); // Exemple avec un booléen par défaut à false
        });
    }
    
    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->dropColumn('is_default');
        });
    }
    
};
