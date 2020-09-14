@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $studentclass->name }}</div>

                <div class="card-body">

                    <form action="{{ route('saveGrades',['studentclass' => $studentclass->id]) }}" method="POST">

                    <table class="table">

                        @foreach ($courses as $course)
                        <thead>

                            <tr>
                                <th scope="col">{{ $course->name }}</th>

                            </tr>

                        </thead>
                        <tbody>
                            @can('view-only')
                            <tr>
                                <td>
                                    {{ $loggedInStudent->name }}
                                </td>
                                <td>
                                    Ditt betyg: {{ $loggedInStudent->grade($studentclass->id, $course->id) }}
                                </td>
                            </tr>
                            @endcan
                            @can('editing-rights')
                    @foreach($students as $student)
                    <tr>

                        <td>
                            {{ $student->name }}
                        </td>

                        <td>
                            <div class="form-group row">
                                @foreach ($grades as $grade)
                                    <div class="form-radio">
                                        <input class="ml-3" type="radio" name="grades[{{ $student->id }}][{{ $course->id }}]" value="{{ $grade->name }}"

                                        @if($student->grade($studentclass->id, $course->id) == ($grade->name)) checked @endif>

                                        <label>{{ $grade->name }}</label>
                                    </div>
                                    @endforeach

                                @endforeach
                                @endcan

                            </div>

                        </td>

                    </tr>

                    @endforeach
                        </tbody>
                    </table>
                        @csrf
                        {{ method_field('PUT') }}
                        @can('editing-rights')
                        <button type="submit" class="btn my-2 btn-primary">
                            Uppdatera alla betyg
                        </button>
                        @endcan
                    </form>


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
