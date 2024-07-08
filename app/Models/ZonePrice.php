<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonePrice extends Model
{
    use HasFactory;

    // Définir les attributs pouvant être remplis en masse
    protected $fillable = [
        'pickup_zone_id',
        'delivery_zone_id',
        'price',
    ];

    /**
     * Get the pickup zone associated with the zone price.
     */
    public function pickupZone()
    {
        return $this->belongsTo(Zone::class, 'pickup_zone_id');
    }

    /**
     * Get the delivery zone associated with the zone price.
     */
    public function deliveryZone()
    {
        return $this->belongsTo(Zone::class, 'delivery_zone_id');
    }
}