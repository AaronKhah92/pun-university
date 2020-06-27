<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = \App\Student::all();
        /*  dd($students); */
        return view('student.index', compact('students'));
    }

    public function store()
    {
        $data = request()->validate([
            'first_name' => 'required|string|min:5',
            'last_name' => 'required|string|min:5',
            'email' => 'required',
            'password' => 'required'
        ]);

        \App\Student::create($data);

        return redirect()->back();
    }
}
