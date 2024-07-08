<?php

namespace App\Models\delivery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
