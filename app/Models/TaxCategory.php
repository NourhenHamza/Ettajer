<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class TaxCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'type',
    ];

    public static function boot()
    {
        parent::boot();

        // Validation lors de la création et de la mise à jour
        static::saving(function ($category) {
            // Validation de l'attribut is_active
            if (!in_array($category->is_active, [true, false])) {
                throw ValidationException::withMessages([
                    'is_active' => ['The is_active field must be boolean.'],
                ]);
            }
        });
    }
}
