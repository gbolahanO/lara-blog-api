<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
