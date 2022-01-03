<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('img/descarga.png') }}" alt="Logo" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @can('departamentos')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropServicios" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Departamentos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('departamentos.index') }}">Listar</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('departamentos.create') }}">Registrar
                                            departamento</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('municipios')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropServicios" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Municipios
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('municipios.index') }}">Listar</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('municipios.create') }}">Registrar
                                            municipios</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('documentos')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropServicios" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Tipo de documento
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('documentos.index') }}">Listar</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('documentos.create') }}">Registrar
                                            tipo de documento</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('generos')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropServicios" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Generos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('generos.index') }}">Listar</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('generos.create') }}">Registrar
                                            genero</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('pacientes')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropServicios" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Pacientes
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('pacientes.index') }}">Listar</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('pacientes.create') }}">Registrar
                                            paciente</a></li>
                                </ul>
                            </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="card-footer text-muted texto-blanco footer">
            Desarrollado por <span class="fw-bold">Jhon Steven Valencia Guzmán</span> &copy; 2021
        </footer>
    </div>
</body>

</html>
