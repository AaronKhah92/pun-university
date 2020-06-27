@extends('layouts.app');

@section('title', 'Student');

@section('content')


    <form action="/student" method="post">
        <input placeholder="firstname" type="text" name="first_name" autocomplete="off">
        <input placeholder="lastname" type="text" name="last_name" autocomplete="off">
        <input placeholder="E-mail" type="text" name="email" autocomplete="off">
        <input placeholder="password" type="text" name="password" autocomplete="off">
            @csrf
        <button>Add Student</button>
    </form>

    @error('firstName') {{ $message }} @enderror
    @error('lastName') {{ $message }} @enderror
    @error('email') {{ $message }} @enderror
    @error('password') {{ $message }} @enderror

    @forelse ($students as $student)
        <p>{{ $student->first_name }}</p>
        <p>{{ $student->last_name }}</p>
        <p>{{ $student->email }}</p>
 {{--    @if($loop->first)
    <h1>Welcome to Pun University {{ $student->first_name  }} {{ $student->last_name }}</h1>
    @endif --}}
    @empty
        <li>No student available</li>

    @endforelse



@endsection
