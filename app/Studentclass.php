<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    protected $fillable = ['name', 'student_id'];

    public function students()
    {
        $this->belongsToMany('App\Student');
    }
}
