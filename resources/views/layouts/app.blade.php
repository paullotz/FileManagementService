<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Dropzone.js-->
    <script src="{{ asset('dropzone-5.7.0/dist/dropzone.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dropzone-5.7.0/dist/dropzone.css') }}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Sweet Alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('swal.js')}}"></script>

    <!-- Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}"/>

    <!-- Styles -->

    <script>
        a = 0;
        btn = document.getElementById("darkmode");
        b = document.getElementById("pagestyle");

        function changeTheme(){
            if(a == 0){
                b.setAttribute("href", '{{ asset('css/app.css') }}');
                a++;
            }else{
                b.setAttribute("href", '{{ asset('css/darkApp.css') }}');
                a--;
            }
        }
    </script>


    <link id="pagestyle" href="{{ asset('css/darkApp.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <title>File Management Service</title>
</head>
<body id="darkBody">
<div id="app">
    <nav id = "navbar" class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="/">
            <img
                src="{{ asset('favicon.png') }}"
                width="30"
                height="30"
                class="d-inline-block align-top"
                alt=""
                loading="lazy"
            />
        </a>
        <a class="navbar-brand" href="/home">
            File-Upload
        </a>
        <a class="navbar-brand" href="/kontakt">
            Contact
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <button type="button" class="btn btn-secondary" id="darkmode" onclick="changeTheme()">dark mode</button>



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
                    <a class="navbar-brand" href="/search">
                        Search
                    </a>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/einstellungen">
                                Einstellungen
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                @endguest
            </ul>
        </div>
    </nav>


</div>

    <main>
        @yield('content')
    </main>

    <link href="{{ asset('lightbox2/css/lightbox.css')}}" rel="stylesheet" />
    <script src="{{ asset('lightbox2/js/lightbox.js')}}"></script>
</body>

<footer class="text-center text-lg-start fixed-bottom">
    <div class="text-center p-3">
        © 2021 Copyright:
        <a id = "darkText" href="#"
        >PSABS File Management Service</a
        >;

        <a id = "darkText" href="/impressum">Impressum;</a>
        <a id = "darkText" href="/kontakt">Contact</a>
    </div>
</footer>
</html>
