@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $studentclass->name }}</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Namn</th>
                                <th scope="col">Betyg</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)

                            <tr>
                                <th scope="row">{{ $course->id }}</th>
                                <td>
                                    {{ $course->name }}
                                </td>
                                <td>
                                    VG
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @can('editing-rights')
                    <a href="/studentclasses" class="btn btn-dark">Tillbaka till alla klasser</a>
                    @endcan

                    @can('view-only')
                    <a href="/studentclasses" class="btn btn-dark">Tillbaka till mina klasser</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
