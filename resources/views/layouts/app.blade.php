<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="favicon/x-icon" href="{{ asset('img/gobslp_icon.png') }}">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SEER | Coordinación General del SICAMM{{-- config('app.name','Laravel') --}}</title>

    <!-- Scripts -->
    <script src="{{-- asset('js/app.js') --}}" defer></script>
    <script src="{{ asset('js/main.js') }}" type="module"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/theme.js') }}"></script>
</head>
<body data-bs-theme="light">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-body-tertiary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/Logo-Seer.png') }}" width="150px" class="mx-6">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest

                    @else
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rh.uploads') }}">Asignaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sicamm.ordenamiento', ['proceso_id' => 1]) }}">Admisión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sicamm.ordenamiento', ['proceso_id' => 2]) }}">Tutoría</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Promoción
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('sicamm.ordenamiento', ['proceso_id' => 3]) }}">Promoción vertical</a></li>
                                <li><a class="dropdown-item" href="{{ route('sicamm.ordenamiento', ['proceso_id' => 4]) }}">Promoción horizontal</a></li>
                                <li><a class="dropdown-item" href="{{ route('sicamm.ordenamiento', ['proceso_id' => 5]) }}">Horas adicionales</a></li>
                            </ul>
                        </li>
                    </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modalBuscar"><i class="bi bi-search"></i>&nbsp;Buscar</button>&nbsp;

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle"></i>&nbsp;
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="bi bi-box-arrow-right"></i>&nbsp;
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <button type="button" class="btn rounded-fill" onclick="changeTheme()"><i id="dl-icon" class="bi bi-moon-fill"></i></button>
                        
                    </ul>
                </div>
            </div>
        </nav>

<!-- Modal -->
<div class="modal fade" id="modalBuscar" tabindex="-1" aria-labelledby="modalBuscarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalBuscarLabel">Buscar un docente</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">
                            <i class="bi bi-search"></i>
                            {{-- <img src="{{ asset('img/search-24.png') }}"> --}}
                        </span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-lg" placeholder="Teclea la CURP" maxlength="18" id="search_participante">
                    </div>
                </form>
            </div>
                <div class="card w-100">
                    <ul class="list-group list-group-flush" id="ul_result_participantes">

                    </ul>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        {{-- Mensajes del sistema --}}
                        @include('layouts.messages')
                    </div>
                        
                    @yield('content')
                </div>
            </div>            
        </main>
    </div>
</body>
</html>
