<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'type_vehicule_id', // Utilisation de type_vehicule_id au lieu de vehicule
        'delivery_route_id', // Utilisation de delivery_route_id
    ];

    // Relation avec TypeVehicule
    public function typeVehicule()
    {
        return $this->belongsTo(TypeVehicule::class, 'type_vehicule_id');
    }

    // Relation avec DeliveryRoute
    public function deliveryRoute()
    {
        return $this->belongsTo(DeliveryRoute::class, 'delivery_route_id');
    }
}
