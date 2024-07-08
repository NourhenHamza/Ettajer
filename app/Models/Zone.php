<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cities'];

    public function pickupPrices()
    {
        return $this->hasMany(ZonePrice::class, 'pickup_zone_id');
    }

    public function deliveryPrices()
    {
        return $this->hasMany(ZonePrice::class, 'delivery_zone_id');
    }
}
