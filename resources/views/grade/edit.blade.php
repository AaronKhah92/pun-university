@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redigera betyget {{ $grade->name }}</div>

                <div class="card-body">

                    <form action="{{ route('grades.update', $grade) }}" method="POST">



                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Betygets nya namn</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $grade->name }}" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
