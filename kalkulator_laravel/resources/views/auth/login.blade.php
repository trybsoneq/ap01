@extends('layouts.main')

@section('content')
<article class="box post">
    <header>
        <h2>Dostęp chroniony. <strong>Zaloguj się</strong></h2>
    </header>
    
    <form action="{{ url('/login') }}" method="post">
        @csrf 
        <div class="row gtr-50 gtr-uniform">
            <div class="col-12">
                <label>Email:</label>
                <input type="email" name="email" style="background-color: #fff; padding: 0.5em;" required />
            </div>
            <div class="col-12">
                <label>Hasło:</label>
                <input type="password" name="password" style="background-color: #fff; padding: 0.5em;" required />
            </div>
            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Zaloguj" class="button icon solid fa-lock" /></li>
                </ul>
            </div>
        </div>
    </form>

    @error('email')
        <div style="margin-top: 1em; padding: 1em; border: 2px solid #f56a6a; background-color: #fcebeb; border-radius: 0.5em;">
            <p style="color: #f56a6a; margin: 0; font-weight:bold;">{{ $message }}</p>
        </div>
    @enderror
</article>
@endsection