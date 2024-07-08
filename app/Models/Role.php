<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{


  protected $primaryKey = 'id';
    protected $fillable = ['name', 'guard_name', 'subscribe'];

    public function users()
    {
      return $this->hasMany(User::class, 'role_id');

    }
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }
}
