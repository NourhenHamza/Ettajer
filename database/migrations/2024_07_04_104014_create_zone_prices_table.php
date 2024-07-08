<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('zone_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pickup_zone_id')->constrained('zones')->onDelete('cascade');
            $table->foreignId('delivery_zone_id')->constrained('zones')->onDelete('cascade');
            $table->decimal('price', 8, 2); // Stocker le prix avec deux décimales
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zone_prices');
    }
};
