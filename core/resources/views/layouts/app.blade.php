<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <div id="app">
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>

                <ul class="right hide-on-med-and-down">
                    @guest
                    <li><a href="{{url('/')}}"><i class="material-icons left">home</i>Beranda</a></li>
                    <li><a href="{{route('peta')}}"><i class="material-icons left">map</i>Peta</a></li>
                    <li><a href="{{route('apotek')}}"><i class="material-icons left">local_pharmacy</i>Apotek</a></li>
                    <li><a href="{{route('tentang')}}"><i class="material-icons left">info</i>Tentang</a></li>
                    @else
                    <li><a href="{{url('/')}}"><i class="material-icons left">home</i>Beranda</a></li>
                    <li><a href="{{route('peta')}}"><i class="material-icons left">map</i>Peta</a></li>
                    <li><a href="{{route('apotek.index')}}"><i class="material-icons left">local_pharmacy</i>Apotek</a></li>
                    <li><a href="{{route('tentang')}}"><i class="material-icons left">info</i>Tentang</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">person</i>{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><i class="material-icons center-align" style="font-size: 60px">person_pin</i></li>
                        <li><a class="center-align" href="#!">{{ Auth::user()->name }}</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="material-icons">power_settings_new</i>Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    @endguest
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    @guest
                    <li><a href="{{url('/')}}"><i class="material-icons left">home</i>Beranda</a></li>
                    <li><a href="{{route('peta')}}"><i class="material-icons left">map</i>Peta</a></li>
                    <li><a href="{{route('apotek')}}"><i class="material-icons left">local_pharmacy</i>Apotek</a></li>
                    <li><a href="{{route('tentang')}}"><i class="material-icons left">info</i>Tentang</a></li>
                    @else
                    <li><a href="#!"><i class="material-icons left">person</i>{{ Auth::user()->name }}</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url('/')}}"><i class="material-icons left">home</i>Beranda</a></li>
                    <li><a href="{{route('peta')}}"><i class="material-icons left">map</i>Peta</a></li>
                    <li><a href="{{route('apotek.index')}}"><i class="material-icons left">local_pharmacy</i>Apotek</a></li>
                    <li><a href="{{route('tentang')}}"><i class="material-icons left">info</i>Tentang</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons left">power_settings_new</i>Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        @yield('content')

        <footer class="page-footer orange">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Menu</h5>
                        <ul>
                            <li><a class="white-text" href="{{url('/')}}"><i class="material-icons left" style="font-size: 20px;">home</i>Beranda</a></li>
                            <li><a class="white-text" href="{{route('peta')}}"><i class="material-icons left" style="font-size: 20px;">map</i>Peta</a></li>
                            <li><a class="white-text" href="{{route('apotek')}}"><i class="material-icons left" style="font-size: 20px;">local_pharmacy</i>Apotek</a></li>
                            <li><a class="white-text" href="{{route('tentang')}}"><i class="material-icons left" style="font-size: 20px;">info</i>Tentang</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Connect</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Facebook</a></li>
                            <li><a class="white-text" href="#!">Twitter</a></li>
                            <li><a class="white-text" href="#!">Instagram</a></li>
                            <li><a class="white-text" href="#!">Whatsapp</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{asset('js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>

    @stack('script')
</body>
</html>
