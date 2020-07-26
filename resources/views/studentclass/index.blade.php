@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mina klasser</div>

                <div class="card-body">


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('view-only')
                            @foreach ($studentclasses as $studentclass)

                            <tr>

                                <th scope="row">{{ $studentclass->id }}</th>
                                <td> {{ $studentclass->name }}</td>
                            </tr>
                            @endforeach
                           @endcan

                            @can('editing-rights')
                            @foreach ($allClasses as $oneClass)

                            <tr>

                                <th scope="row">{{ $oneClass->id }}</th>
                                <td> {{ $oneClass->name }}



                                    <a href="{{ route('studentclasses.edit', $oneClass->id) }}"><button type="button"
                                            class="btn ml-4 btn-primary">Redigera</button></a>

                                    <form class="d-inline" action="{{ route('studentclasses.destroy', $oneClass) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger ">Radera</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            @endcan

                        </tbody>
                    </table>
                    <a href="/studentclasses/create" class="btn btn-dark">Skapa en klass</a>
                    <a href="/home" class="btn btn-dark">Tillbaka till adminpanel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
