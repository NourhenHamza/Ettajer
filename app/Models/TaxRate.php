<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tax_category_id',
        'rate',
        'is_active',
        'valid_from',
        'valid_until',
    ];

    protected $casts = [
        'rate' => 'float',
        'is_active' => 'boolean',
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
    ];

    public function taxCategory()
    {
        return $this->belongsTo(TaxCategory::class);
    }
}
