<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programm extends Model
{
    protected $table = 'programs';

    protected $fillable = [
        'name', 'message', 'coach_id', 'day_1',  'day_2', 'day_3', 'day_4',  'day_5', 'day_6', 'day_7', 'days'
    ];

    public function comments()
    {
        return $this->hasMany('App\Training');
    }
}
