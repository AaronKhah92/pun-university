@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mina betyg</div>

                <div class="card-body">


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grades as $grade)

                            <tr>
                                <th scope="row">{{ $grade->id }}</th>
                                <td> {{ $grade->name }}

                                    <a href="{{ route('grades.edit', $grade->id) }}"><button type="button"
                                            class="btn  btn-primary">Redigera</button></a>

                                    <form class="d-inline" action="{{ route('grades.destroy', $grade) }}" method="POST">
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
