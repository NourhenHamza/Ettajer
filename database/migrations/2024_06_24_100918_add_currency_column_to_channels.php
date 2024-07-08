<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * <?php
*declare(strict_types=1);

*use Illuminate\Database\Migrations\Migration;
*use Illuminate\Database\Schema\Blueprint;
*use Illuminate\Support\Facades\Schema;

*return new class () extends Migration {
    *public function up(): void
   * {
      *  Schema::table('channels', function (Blueprint $table) {
     *       $table->char('currency', 3)->nullable()->after('slug');
       * });
  *  }

   * public function down(): void
   * {
      *  Schema::table('channels', function (Blueprint $table) {
        *    $table->dropColumn('currency');
        *});
   * }
*};
     */
    public function up(): void
    {
        Schema::table('channels', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('channels', function (Blueprint $table) {
            //
        });
    }
};
