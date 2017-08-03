<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $with = ['user'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function colors()
    {
        return [
          '#610B0B','#61380B','#5E610B','#38610B','#0B610B','#0B6138','#0B615E',
          '#0B3861','#0B0B61','#380B61', '#610B5E','#610B38','#610B21'
        ];
    }
}
