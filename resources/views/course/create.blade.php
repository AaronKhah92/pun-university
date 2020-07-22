@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Skapa ny klass</div>

                <div class="card-body">
                    <form action="/courses" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="name">Kursens namn</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="PHP">
                            <small id="nameHelp" class="form-text text-muted">Ange ett namn för kursen.</small>

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Kursens beskrivning</label>
                            <input name="description" type="text" class="form-control" id="description" aria-describedby="descriptionHelp" placeholder="PHP är ett ...">
                            <small id="descriptionHelp" class="form-text text-muted">Ange en beskrivning för kursen.</small>

                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Skapa Kurs</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
