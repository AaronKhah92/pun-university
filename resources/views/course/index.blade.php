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

                                <a href="{{ route('courses.edit', $course->id) }}"><button type="button" class="btn  btn-primary">Redigera</button></a>

                                <form class="d-inline" action="{{ route('courses.destroy', $course) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger ">Radera</button>
                                </form>
                                </td>
                              </tr>
                            @endforeach


                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
