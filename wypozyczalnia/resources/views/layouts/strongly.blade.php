<!DOCTYPE HTML>
<!--
    Strongly Typed by HTML5 UP
    html5up.net | @ajlkn
-->
<html lang="pl">
<head>
    <title>Wypożyczalnia Aut - Panel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    
    <style>
        #logo, #logo a {
            font-family: 'Roboto Slab', serif !important;
        }
    </style>
</head>
<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <section id="header">
            <div class="container">

                <h1 id="logo"><a href="/dashboard">Wypożyczalnia</a></h1>
                <p>System zarządzania flotą i rezerwacjami</p>

                <nav id="nav">
                    <ul>
                        <li><a class="icon solid fa-home" href="/dashboard"><span>Panel Główny</span></a></li>
                        <li><a class="icon solid fa-car" href="#"><span>Katalog Aut</span></a></li>
                        
                        @if(Auth::user()->roles->contains('name', 'Administrator'))
                            <li><a class="icon solid fa-users" href="{{ route('users.index') }}"><span>Użytkownicy</span></a></li>
                        @endif

                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <a class="icon solid fa-sign-out-alt" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <span>Wyloguj</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>

            </div>
        </section>

        <section id="main">
            <div class="container">
                <div id="content">
                    
                    @yield('content')
                    
                </div>
            </div>
        </section>

        <section id="footer">
            <div class="container">
                <div id="copyright">
                    <ul class="links">
                        <li>&copy; Wypożyczalnia Aut. Projekt na zaliczenie.</li>
                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                </div>
            </div>
        </section>

    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>