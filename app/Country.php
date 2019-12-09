<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function articles(){
        return $this->hasManyThrough('App\Article', 'App\User');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
