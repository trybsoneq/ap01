@extends('layouts.main')

@section('content')
<article class="box post">
    <header>
        <h2>Lista kont w <strong>bazie danych</strong></h2>
    </header>
    @if(session('success'))
        <div style="padding: 1em; background-color: #e6f6e6; border-left: 5px solid #4CAF50; margin-bottom: 1em;">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    @error('login')
        <div style="padding: 1em; background-color: #fcebeb; border-left: 5px solid #f56a6a; margin-bottom: 1em; color: #f56a6a;">
            <strong>{{ $message }}</strong>
        </div>
    @enderror

    @auth
        <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 2em; border: 1px solid #ddd;">
            <h3 style="margin-bottom: 1em;">Dodaj nowe konto do bazy</h3>
            <form action="{{ route('accounts.store') }}" method="POST">
                @csrf
                <div class="row gtr-50 gtr-uniform">
                    <div class="col-4 col-12-mobilep">
                        <input type="text" name="login" placeholder="Wpisz Login" required style="background: #fff;" />
                    </div>
                    <div class="col-4 col-12-mobilep">
                        <input type="password" name="password" placeholder="Wpisz Hasło" required style="background: #fff;" />
                    </div>
                    
                    @if(Auth::user()->role === 'admin')
                    <div class="col-2 col-12-mobilep">
                        <select name="role" style="background: #fff;">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    @endif

                    <div class="col-2 col-12-mobilep">
                        <ul class="actions">
                            <li><input type="submit" value="Zapisz w BD" class="button primary" style="padding: 0 1em;"/></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    @endauth

    <table style="width:100%; border-collapse: collapse; margin-top: 1em;">
        <thead>
            <tr style="background-color: #f4f4f4; text-align: left;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Login</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Rola</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $acc)
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $acc->id }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $acc->login }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $acc->role }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">
                    
                    @guest
                        <span style="color: #999; font-style: italic;">Brak uprawnień</span>
                    @endguest

                    @auth
                        @if(Auth::user()->role === 'user' || Auth::user()->role === 'admin')
                            <a href="{{ route('accounts.edit', $acc->id) }}" class="button alt small">Edytuj</a>
                        @endif

                        @if(Auth::user()->role === 'admin')
                            <form action="{{ route('accounts.destroy', $acc->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button small" style="background-color: #f56a6a; color:white; box-shadow: none;">Usuń</button>
                            </form>
                        @endif
                    @endauth

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</article>
@endsection