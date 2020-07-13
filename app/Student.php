<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'studentclass_id', 'user_id'];

    public function studentclasses()
    {
        $this->belongsToMany('App\Studentclass');
    }
}
