<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',

    ];
    protected $hidden = [
        'password',

    ];

    public function role()
    {
      echo "Role relationship accessed for user: " . $this->id . "\n";

      return $this->belongsTo(Role::class);
    }

    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'model', 'model_has_permissions', 'model_id', 'permission_id');
    }



}
