<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Utilisation d'une classe anonyme pour la migration
return new class extends Migration {

    public function up()
    {
        // Création de la table pickup_addresses
        Schema::create('pickup_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name');
            $table->string('phone_number');
            $table->string('address');
            //$table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('cascade');
            $table->timestamps();
        });

        // Création de la table delivery_addresses
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name');
            $table->string('phone_number');
            //$table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('cascade');
            $table->string('address');
            $table->timestamps();
        });

        // Création de la table parcels (colis)
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcel_status_id')->constrained('parcel_statuses')->onDelete('cascade');
            $table->foreignId('product_material_id')->constrained('product_materials')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->decimal('weight', 8, 2);
            $table->decimal('height', 8, 2);
            $table->decimal('depth', 8, 2);
            $table->decimal('width', 8, 2);
            $table->timestamps();
        });
        
        Schema::create('delivery_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->timestamps();
        });

        // Création de la table deliveries (livraisons)
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pickup_address_id')->constrained('pickup_addresses')->onDelete('cascade');
            $table->foreignId('delivery_address_id')->constrained('delivery_addresses')->onDelete('cascade');
            $table->foreignId('parcel_id')->constrained('parcels')->onDelete('cascade');
            $table->foreignId('delivery_type_id')->constrained('delivery_types')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        // Suppression des tables dans l'ordre inverse de leur création
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('parcels');
        Schema::dropIfExists('delivery_addresses');
        Schema::dropIfExists('pickup_addresses');
        Schema::dropIfExists('delivery_types');
    }
};
