@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redigera kursen {{ $course->name }}</div>

                <div class="card-body">

                    <form action="{{ route('courses.update', $course) }}" method="POST">



                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Kursens nya namn</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $course->name }}" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">Kursens nya
                                beskrivning</label>

                            <div class="col-md-6">
                                <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ $course->description }}" required autofocus>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grades"
                                class="col-md-6 col-form-label text-md-right">Betyg:</label>
                            <div class="col-md-2">
                                @foreach ($grades as $grade)
                                <div class="form-check">
                                    <input type="checkbox" name="grades[]" value="{{ $grade->id }}"
                                        @if($course->grades->pluck('id')->contains($grade->id)) checked
                                    @endif>
                                    <label>{{ $grade->name }}</label>
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
