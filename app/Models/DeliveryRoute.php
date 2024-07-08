<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryRoute extends Model
{
    use HasFactory;

    protected $fillable = ['cities'];

    // Relation inverse avec Livreur
    public function livreurs()
    {
        return $this->hasMany(Livreur::class);
    }
}
