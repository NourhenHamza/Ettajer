<?php

namespace App\Models\delivery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcel_status_id',
        'product_material_id',
        'price',
        'weight',
        'height',
        'depth',
        'width',
    ];

    public function parcelStatus()
    {
        return $this->belongsTo(ParcelStatus::class);
    }

    public function productMaterial()
    {
        return $this->belongsTo(ProductMaterial::class);
    }
}
