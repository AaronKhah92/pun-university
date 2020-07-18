@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mina klasser</div>

                <div class="card-body">
                    @foreach ($studentclasses as $studentclass)
                        <h2>{{ $studentclass->name }}</h2>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
