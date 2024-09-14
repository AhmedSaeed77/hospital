<?php

namespace App\Models;

use Laratrust\Traits\HasRolesAndPermissions;
use Laratrust\Contracts\LaratrustUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable implements LaratrustUser
{
    use HasRolesAndPermissions;

    protected $table = 'managers';
    protected $guarded = [];
    protected $casts = [
        'password' => 'hashed',
    ];
    protected $hidden = [
        'password',
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
}
