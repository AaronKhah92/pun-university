@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mina kurser</div>

                <div class="card-body">


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)

                            <tr>
                                <th scope="row">{{ $course->id }}</th>

                                <td> {{ $course->name }}
                                </td>
                                <td>
                                    <a href="/courses/{{ $course->id }}"><button type="button"
                                        class="btn ml-4 btn-success">Visa</button></a>
                                </td>
                                <td>
                                    <a href="{{ route('courses.edit', $course->id) }}"><button type="button"
                                            class="btn ml-4 btn-primary">Redigera</button></a>
                                </td>
                                <td>
                                    <form class="d-inline" action="{{ route('courses.destroy', $course) }}"
                                        method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger ">Radera</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <a href="/courses/create" class="btn btn-dark">Skapa en kurs</a>
                    <a href="/home" class="btn btn-dark">Tillbaka till adminpanel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
