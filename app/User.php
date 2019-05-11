<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'userID', 'roleID');
    }

    public function hasAccess(array $permissions) : bool
    {
        foreach ($this->roles as $role){
            if ($role->hasAccess($permissions)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role_slug) : bool
    {
        return $this->roles()->where('slug', $role_slug)->count() == 1;
    }
}
