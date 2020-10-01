<?php

namespace App\Http\Controllers;

use App\Course;
use App\Grade;
use App\Studentclass;
use App\User;
use Gate;
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
            'name' => 'required',
        ]);

        $studentclass = \App\Studentclass::create($data);

        return redirect('/studentclasses/' . $studentclass->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function show(Studentclass $studentclass)
    {

        $loggedInStudent = auth()->user();
        $students = $studentclass->users()->with('courses')->get();
        $grades = Grade::all();
        $courses = $studentclass->courses;
        if (Gate::denies('editing-rights')) {
            return view('studentclass.show', compact('studentclass', 'courses', 'loggedInStudent'));
        }
        return view('studentclass.show', compact('studentclass', 'courses', 'students', 'grades'));
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
        return view('studentclass.edit')->with([
            'studentclass' => $studentclass,
            'courses' => $courses,

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

    public function setGrades(Studentclass $studentclass, Request $request)
    {

        $students = $studentclass->users;
        $grades = $request->request->get('grades');
        $courses = $studentclass->courses;
        foreach ($grades as $student => $courses) {
            $sync = [];
            foreach ($courses as $course => $grade) {
                $user = User::find($student);
                $xcourse = Course::find($course);
                $sync[$xcourse->id] = ['studentclass_id' => $studentclass->id, 'user_id' => $user->id, 'grade_name' => $grade];
            }
            if ($xcourse == null || $xcourse->id == null) {
                $user->courses()->detach($sync);
            }
            $user->courses()->sync($sync);
        }
        return redirect()->route('showGrades', ['studentclass' => $studentclass->id]);
    }
}
