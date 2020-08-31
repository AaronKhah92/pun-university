<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    public function studentclasses()
    {
        return $this->belongsToMany('App\Studentclass');
    }


    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Studentclass');
    }
}
