<?php

namespace App\Models\delivery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_name',
        'phone_number',
        'address',
    ];
}
