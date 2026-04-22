@extends('layouts.main')

@section('content')
<article class="box post">
    <header>
        <h2>Edycja konta: <strong>{{ $account->login }}</strong></h2>
    </header>

    @error('login')
        <div style="padding: 1em; background-color: #fcebeb; border-left: 5px solid #f56a6a; margin-bottom: 1em; color: #f56a6a;">
            <strong>{{ $message }}</strong>
        </div>
    @enderror

    <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-top: 2em; border: 1px solid #ddd;">
        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            <div class="row gtr-50 gtr-uniform">
                <div class="col-12">
                    <label>Login:</label>
                    <input type="text" name="login" value="{{ $account->login }}" required style="background: #fff;" />
                </div>
                
                <div class="col-12">
                    <label>Nowe hasło (zostaw puste, jeśli nie chcesz zmieniać):</label>
                    <input type="password" name="password" style="background: #fff;" />
                </div>
                
                @if(Auth::user()->role === 'admin')
                <div class="col-12">
                    <label>Rola:</label>
                    <select name="role" style="background: #fff;">
                        <option value="user" {{ $account->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $account->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                @endif

                <div class="col-12" style="margin-top: 1.5em;">
                    <ul class="actions">
                        <li><input type="submit" value="Zapisz zmiany" class="button primary" /></li>
                        <li><a href="{{ route('accounts.index') }}" class="button alt">Anuluj</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</article>
@endsection