@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redigera klassen {{ $studentclass->name }}</div>

                <div class="card-body">

                    <form action="{{ route('studentclasses.update', $studentclass) }}" method="POST">



                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Klassens nya namn</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $studentclass->name }}" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="courses"
                                class="col-md-6 col-form-label text-md-right">Kurser:</label>
                            <div class="col-md-2">
                                @foreach ($courses as $course)
                                <div class="form-check">
                                    <input type="checkbox" name="courses[]" value="{{ $course->id }}"
                                        @if($studentclass->courses->pluck('id')->contains($course->id)) checked @endif>
                                    <label>{{ $course->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>


                        @csrf
                        {{ method_field('PUT') }}

                        <button type="submit" class="btn btn-primary">
                            Uppdatera
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
