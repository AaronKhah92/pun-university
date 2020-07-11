@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Skapa ny klass</div>

                <div class="card-body">
                    <form action="/studentclasses" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="name">Klassens namn</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="WCMS18">
                            <small id="nameHelp" class="form-text text-muted">Ange ett namn för klassen.</small>

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Skapa klass</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
