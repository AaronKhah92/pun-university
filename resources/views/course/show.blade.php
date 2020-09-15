@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $course->name }}</div>

                <div class="card-body">
                    <p>{{ $course->description }}</p>

                    @can('editing-rights')
                    <a href="/courses" class="btn btn-dark">Tillbaka till kurser</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
