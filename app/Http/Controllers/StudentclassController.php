<?php

namespace App\Http\Controllers;

use App\Studentclass;
use App\User;
use App\Student;
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
        $studentclasses = auth()->user()->studentclasses()->get();
        return view('studentclass.index', compact('studentclasses'));
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
        return view('studentclass.show', compact('studentclass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Studentclass $studentclass)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studentclass $studentclass)
    {
        //
    }
}
