<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    protected $fillable = ['name', 'student_id', 'user_id'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
