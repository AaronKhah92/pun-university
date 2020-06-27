<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function test()
    {
        return view('test');
    }

    public function services()
    {


        $services = \App\Service::all();


        return view('services', compact('services'));
    }

    public function index()
    {
        $coolstring = "Poop di doop, it works, hello from controller";

        return $coolstring;
    }
}
