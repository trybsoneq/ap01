@extends('layouts.strongly')

@section('content')
    <article class="box post">
        <header>
            <h2>Witaj w wypożyczalni, <strong>{{ Auth::user()->name }}</strong>!</h2>
            <p>Jesteś zalogowany w systemie.</p>
        </header>
        
        <p>
            Twój adres email: <strong>{{ Auth::user()->email }}</strong>
        </p>

        <section>
            <header>
                <h3>Twoje uprawnienia w systemie:</h3>
            </header>
            <ul>
                @forelse(Auth::user()->roles as $role)
                    <li><strong>{{ $role->name }}</strong></li>
                @empty
                    <li>Brak przypisanych ról</li>
                @endforelse
            </ul>
        </section>
    </article>
@endsection