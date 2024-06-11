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


    @yield('extra_style')
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-pale-white shadow position-relative">
            <div class="container py-2">
                {{-- toggle button  --}}
                <button class="btn btn-sm fs-5 btn-primary text-white ms-2" id="toggleBtn">
                    <i class="bi bi-view-list"></i>
                </button>

                <div class="text-center flex-fill">
                    <a class="navbar-brand  text-uppercase text-primary fw-bold" href="{{ url('/') }}">
                        <img width="30px" class="bg-light rounded-circle" src="{{ asset('images/angry_3991617.png') }}" alt=""> {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                {{-- user icon  --}}
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="btn btn-sm w-100"> <i class="bi bi-lock-fill"></i> Logout</button>
                        </form>
                    </ul>
                </div>
                  

            </div>

            {{-- Side Bar --}}
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

        <footer class="bg-pale-white shadow position-absolute bottom-0 w-100 py-3">
            <div class="d-flex justify-content-evenly w-75 mx-auto">
                <i class="bi bi-house"></i>
                <i class="bi bi-house"></i>
                <i class="bi bi-house"></i>
            </div>
        </footer>

        <script>
            @yield('extra_scripts')
        </script>
    </div>
</body>
</html>
