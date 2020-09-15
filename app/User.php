<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function studentclasses()
    {
        return $this->belongsToMany('App\Studentclass');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course')->withPivot('grade_name', 'studentclass_id');
    }

    public function grade($studentclass_id, $course_id)
    {
        $userCourses = $this->courses()->wherePivot('studentclass_id', $studentclass_id)->wherePivot('course_id', $course_id)->get()->first();

        if ($userCourses != null) {
            return $userCourses->pivot->grade_name;
        }

        return null;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }
}
