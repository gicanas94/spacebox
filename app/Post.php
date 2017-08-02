<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo('App\Spacebox');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
