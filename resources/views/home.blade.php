@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @can('manage-users')
                    Välkommen till Adminitrationspanelen {{ $user->name }}
                    @endcan

                    @can('view-only')
                    Mina sidor för {{ $user->name }}
                    @endcan
                </div>

                <div class="card-body">
                    @can('manage-users')

                    <a href="/studentclasses" class="btn btn-dark">Hantera klasser</a>


                    <a href="/courses" class="btn btn-dark">Hantera Kurser</a>



                    <a href="admin/users" class="btn btn-dark">Hantera Användare</a>

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
