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
}
