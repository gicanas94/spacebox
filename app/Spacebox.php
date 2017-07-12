<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spacebox extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
