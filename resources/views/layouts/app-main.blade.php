<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/main-style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $(function () {
                $('#home').click(function (e) {
                    localStorage.setItem('menu-active', 'home')
                });

                $('#drive').click(function (e) {
                    localStorage.setItem('menu-active', 'drive')
                });

                $('#link').click(function (e) {
                    localStorage.setItem('menu-active', 'link')
                });

                $('#name').click(function (e) {
                    localStorage.setItem('menu-active', 'name')
                });


                const menuActive = localStorage.getItem('menu-active');

                if (menuActive === 'home') {
                    $('#home').addClass('text-red-neon')
                }

                if (menuActive === 'drive') {
                    $('#drive').addClass('text-red-neon')
                }

                if (menuActive === 'link') {
                    $('#link').addClass('text-red-neon')
                }

                if (menuActive === 'name') {
                    $('#name').addClass('text-red-neon')
                }
            })
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="mt-0" src="{{ asset('images/logo-doc2.svg') }}" width="35%" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a id='home' class="nav-link px-4 py-2" aria-current="apge" href="{{ route('home') }}"> <i class="bi bi-house-fill"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a id='drive' class="nav-link px-4 py-2" aria-current="page" href="{{ route('drive') }}"> <i class="bi bi-hdd-fill"></i> My Drive</a>
                        </li>
                        <li class="nav-item">
                            <a id='link' class="nav-link px-4 py-2" aria-current="page" href="{{ route('link') }}"> <i class="bi bi-link fw-bold"></i> Links</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id='name' class="nav-link dropdown-toggle px-4 py-2" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li>
                                    <a class="dropdown-item fw-bold" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav>
        </div>
        <main class="container-fluid">
            @yield('content')
        </main>
        @yield('script')
        <footer class="container mt-2 text-navy">
            &copy; Yasunaga Indonesia 2023 <span class="text-red-neon">&#10084;</span>
        </footer>
    </body>
</html>
