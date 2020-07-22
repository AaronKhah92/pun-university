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

    public function grades()
    {
        return $this->hasManyThrough('App\Grade', 'App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
