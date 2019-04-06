<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'post_image', 'content', 'published'
    ];
    
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
