<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers'; // Define the table name if it's not the default 'customers'

    protected $fillable = [
        'type',
        'email',
        'phone',
        'firstname',
        'lastname',
        'company_name',
        'tax_nr',
        'registration_nr',
        'website',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the full name of the customer by concatenating firstname and lastname.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    /**
     * Scope a query to only include active customers.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
