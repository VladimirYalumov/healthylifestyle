<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $table = 'roles';

    protected $fillable = [
        'name', 'slug', 'permissions'
    ];

    protected $casts =[
        'permissions' => 'array'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'roleID', 'userID');
    }

}
