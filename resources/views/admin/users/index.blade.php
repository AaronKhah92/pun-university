@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Alla Användare</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Klasser</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)

                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td> {{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toarray() ) }}
                                </td>

                                <td>{{ implode(', ', $user->studentclasses()->get()->pluck('name')->toarray() ) }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button"
                                            class="btn  btn-primary">Redigera</button></a>
                                </td>

                                <td>
                                    <form class="d-inline" action="{{ route('admin.users.destroy', $user) }}"
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

                   {{--  <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)

                            <tr>
                                <th scope="row">{{ $student->id }}</th>
                                <td> {{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table> --}}
                    <a href="users/create" class="btn btn-dark">Lägg till en student</a>
                    <a href="/home" class="btn btn-dark">Tillbaka till adminpanel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
