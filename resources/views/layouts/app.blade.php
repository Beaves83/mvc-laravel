<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- Head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GRM') }}</title>

        <!-- Scripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script> 
        <script src="{{ asset('js/lists.js') }}"></script>
        <script src="{{ asset('js/datatable.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>

        <!-- Styles -->
        <!--        <link href="{{ asset('css/datatable.css') }}" rel="stylesheet">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <!-- Head -->
    <body >
        <div id="app">
            <!-- NavBar -->
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        GRM<!--{{ config('app.name', 'GRM') }}-->
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                            @guest

                            @else 
                            @if ( Auth::user()->hasRole('admin') OR Auth::user()->hasRole('secretario')
                            OR Auth::user()->hasRole('medico'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('citas/calendar') }}">Calendario</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Clientes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if ( Auth::user()->hasRole('admin') OR Auth::user()->hasRole('secretario') )
                                    <a class="dropdown-item" href="{{ URL::to('clientes/create') }}">Nuevo</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ URL::to('clientes') }}">Listado</a>
                                    @if ( Auth::user()->hasRole('admin') OR Auth::user()->hasRole('secretario') )
                                    <a class="dropdown-item" href="{{ URL::to('clientes/expires') }}">Contratos que expiran</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ URL::to('clientes/historical') }}">Histórico</a>      
                                    @endif
                                    
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Citas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if ( Auth::user()->hasRole('admin') OR Auth::user()->hasRole('secretario') )
                                    <a class="dropdown-item" href="{{ URL::to('citas/create') }}">Nueva</a>
                                     @endif
                                    <a class="dropdown-item" href="{{ URL::to('citas') }}">Pendientes</a>                                                  
                                    @if ( Auth::user()->hasRole('admin') OR Auth::user()->hasRole('secretario') )
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ URL::to('citas/historical') }}">Histórico</a>    
                                    @endif
                                </div>
                            </li>
                            @if ( Auth::user()->hasRole('admin') )
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Usuarios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ URL::to('usuarios/create') }}">Nuevo</a>
                                    <a class="dropdown-item" href="{{ URL::to('usuarios') }}">Listado</a>
<!--                                    <div class="dropdown-divider"></div>-->
                                </div>
                            </li>
                            @endif
                            @endif
                            @endguest
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                        {{ __('Desconectar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- NavBar -->
            <main class="py-4" style="margin-top:50px">
                @yield('content')
            </main>
        </div>
        <!-- Footer -->
        <footer class="page-footer font-small cyan darken-3">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© {{ date('Y') }} Copyright:
                <a href="#"> Bibi Ruiz</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
    </body>
</html>
