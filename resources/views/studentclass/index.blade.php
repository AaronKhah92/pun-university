@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @can('view-only')
                        Mina klasser
                    @endcan

                    @can('editing-rights')
                        Alla Klasser
                    @endcan
                </div>

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
                                <a href="/studentclasses/{studentclass}"><td> {{ $studentclass->name }}</td></a>
                                <td>
                                    <a href="/studentclasses/{{ $studentclass->id }}"><button type="button"
                                        class="btn ml-4 btn-success">Visa</button></a>
                                </td>
                            </tr>



                            @endforeach
                            @endcan

                            @can('editing-rights')
                            @foreach ($allClasses as $oneClass)

                            <tr>

                                <th scope="row">{{ $oneClass->id }}</th>
                                <td> {{ $oneClass->name }}
                                </td>
                                <td>
                                    <a href="/studentclasses/{{ $oneClass->id }}"><button type="button"
                                        class="btn ml-4 btn-success">Visa</button></a>
                                </td>
                                <td>
                                    <a href="{{ route('studentclasses.edit', $oneClass->id) }}"><button type="button"
                                        class="btn ml-4 btn-primary">Redigera</button></a>
                                </td>

                                <td>
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
                    @can('editing-rights')
                    <a href="/studentclasses/create" class="btn btn-dark">Skapa en klass</a>
                    <a href="/home" class="btn btn-dark">Tillbaka till adminpanel</a>
                    @endcan
                    @can('view-only')
                        <a href="/home" class="btn btn-dark">Tillbaka till Mina Sidor</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
