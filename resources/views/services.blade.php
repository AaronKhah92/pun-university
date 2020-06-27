@extends('layouts.app');

@section('title', 'Services');

@section('content')

<h1>Welcome to laravel 7 Services</h1>

<ul>
    @forelse ($services as $service)
        <li>{{ $service->name }}</li>
    @empty
        <li>No services available</li>
    @endforelse
</ul>


@endsection
