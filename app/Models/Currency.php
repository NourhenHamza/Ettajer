<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso_code',
        'exchange_rate',
        'decimals',
        'status',
        'symbol',
        'is_default', // Assurez-vous que le nom de la colonne correspond à ce que vous utilisez
    ];

    public static function boot()
    {
        parent::boot();

        // Validation lors de la création et de la mise à jour
        static::saving(function ($currency) {
            // Vérifier si la devise est définie comme par défaut
            if ($currency->is_default) { // Utilisation de is_default
                // Vérifier si une autre devise par défaut existe déjà
                if (static::where('is_default', true)->where('id', '!=', $currency->id)->exists()) {
                    throw ValidationException::withMessages([
                        'is_default' => ['There can be only one default currency.'],
                    ]);
                }
            }
        });
    }
}
