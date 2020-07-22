<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }
}
