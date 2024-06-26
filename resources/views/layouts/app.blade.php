<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-pale-white shadow position-relative">
            <div class="container py-2">
                {{-- toggle button  --}}
                <button class="btn btn-sm fs-5 btn-primary text-white" id="toggleBtn">
                    <i class="bi bi-view-list"></i>
                </button>

                <a class="navbar-brand text-uppercase text-primary fw-bold" href="{{ url('/') }}">
                    <img width="30px" class="bg-light rounded-circle" src="{{ asset('images/angry_3991617.png') }}" alt=""> {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="side-bar w-25 vh-100 position-absolute text-white top-0 p-4 bg-primary z-1">
                  <div class="d-flex justify-content-between">
                    <a class="navbar-brand text-uppercase text-white fw-bold" href="{{ url('/') }}">
                        <img width="30px" class="bg-light rounded-circle" src="{{ asset('images/angry_3991617.png') }}" alt=""> {{ config('app.name', 'Laravel') }}
                    </a>
                    <button id="closeBtn" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-x fs-5"></i>
                    </button>
                  </div>
            </div>  
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
