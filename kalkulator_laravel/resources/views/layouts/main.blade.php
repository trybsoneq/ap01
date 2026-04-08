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
                            <li><a class="icon solid fa-info-circle" href="#"><span>O nas</span></a></li>
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