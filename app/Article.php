<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'title', 'body'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
