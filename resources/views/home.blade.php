@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @can('manage-users')
                    Redigera Användare
                    @endcan

                    @can('view-only')
                    Mina sidor
                    @endcan
                </div>

                <div class="card-body">
                    @can('manage-users')
                    <a href="/studentclasses/create" class="btn btn-dark">Skapa en klass</a>
                    <a href="/students/create" class="btn btn-dark">Lägg till en student</a>
                    @endcan

                    @can('view-only')

                    <a href="/studentclasses" class="btn btn-dark">Se mina klasser</a>

                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
