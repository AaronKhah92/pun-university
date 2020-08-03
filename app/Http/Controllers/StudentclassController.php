<?php

namespace App\Http\Controllers;

use Gate;
use App\Studentclass;
use App\User;
use App\Grade;
use App\Course;
use Illuminate\Http\Request;

class StudentclassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allClasses = Studentclass::all();
        $studentclasses = auth()->user()->studentclasses()->get();
        $courses = Course::all();
        return view('studentclass.index', compact('studentclasses', 'allClasses', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentclass.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required'
        ]);

        $data['user_id'] = auth()->user()->id;

        $studentclass = \App\Studentclass::create($data);


        return  redirect('/studentclasses/' . $studentclass->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function show(Studentclass $studentclass)
    {
        $courses = $studentclass->courses()->get();
        return view('studentclass.show', compact('studentclass', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Studentclass $studentclass)
    {
        if (Gate::denies('editing-rights')) {
            return redirect(route('studentclasses.index'));
        }
        $courses = Course::all();
        $grades = Grade::all();
        return view('studentclass.edit')->with([
            'studentclass' => $studentclass,
            'courses' => $courses,
            'grades' => $grades
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studentclass $studentclass)
    {
        $studentclass->courses()->sync($request->courses);
        $studentclass->name = $request->name;
        $studentclass->save();
        return redirect()->route('studentclasses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studentclass $studentclass)
    {
        if (Gate::denies('deleting-rights')) {
            return redirect(route('studentclasses.index'));
        }
        $studentclass->courses()->detach();
        $studentclass->delete();

        return redirect()->route('studentclasses.index');
    }
}
