<!DOCTYPE HTML>
<html>
    <head>
        <title>Kalkulator Kredytowy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    </head>
    <body class="homepage is-preload">
        <div id="page-wrapper">
            <section id="header">
                <div class="container">
                    <h1 id="logo"><a href="{{ url('/') }}">Kalkulator Kredytowy</a></h1>
                    <p>Proste narzędzie do obliczania miesięcznej raty kredytu.</p>
                    <nav id="nav">
                        <ul>
                            <li><a class="icon solid fa-home" href="{{ url('/') }}"><span>Start</span></a></li>
                            <li><a class="icon solid fa-calculator" href="{{ url('/') }}"><span>Kalkulator</span></a></li>
                            
                            @guest
                                <li><a class="icon solid fa-lock" href="{{ url('/login') }}"><span>Zaloguj</span></a></li>
                            @endguest
                            
                            @auth
                                @if(Auth::user()->role === 'admin')
                                    <li><a class="icon solid fa-cog" href="{{ url('/admin') }}" style="color: red;"><span>Panel Admina</span></a></li>
                                @endif

                                <li>
                                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" style="background:none; border:none; box-shadow:none; padding:0; margin:0; cursor:pointer; color:inherit;">
                                            <a class="icon solid fa-sign-out-alt"><span>Wyloguj</span></a>
                                        </button>
                                    </form>
                                </li>
                            @endauth
                            
                        </ul>
                    </nav>
                </div>
            </section>

            <section id="main">
                <div class="container">
                    <div class="row">
                        <div id="content" class="col-8 col-12-medium">
                            @yield('content')
                        </div>
                        <div id="sidebar" class="col-4 col-12-medium">
                            @yield('sidebar')
                        </div>
                    </div>
                </div>
            </section>
            <section id="footer">
                <div class="container">
                    <div id="copyright" class="container">
                        <ul class="links">
                            <li>&copy; Kalkulator Kredytowy. All rights reserved.</li>
                            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/browser.min.js') }}"></script>
        <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/util.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>