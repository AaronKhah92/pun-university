<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pun University</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->

</head>

<body>
    <div>
        {{--  class="flex-center position-ref full-height" --}}
        @if (Route::has('login'))
        <div class="top-right pun-menu links">
            @auth
            @can('editing-rights')
            <a href="{{ url('/home') }}">Adminpanel</a>
            @endcan
            @can('view-only')
            <a href="{{ url('/home') }}">Mina sidor</a>
            @endcan
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4 title m-b-md">Pun University</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, ex.</p>
                </div>
                <div class="card home-card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
