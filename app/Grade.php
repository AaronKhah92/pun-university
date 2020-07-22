<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Course');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }
}
