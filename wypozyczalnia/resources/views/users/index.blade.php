@extends('layouts.strongly')

@section('content')
    <article class="box post">
        <header>
            <h2>Zarządzanie <strong>Użytkownikami</strong></h2>
            <p>Lista wszystkich osób zarejestrowanych w systemie</p>
        </header>

        <div class="table-wrapper">
            <table class="alt" style="width: 100%; text-align: left; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: solid 2px #e5e5e5;">
                        <th>ID</th>
                        <th>Imię i Nazwisko</th>
                        <th>Email / PESEL</th>
                        <th>Role w systemie</th>
                        <th>RODO (Utworzył)</th>
                        <th>Data rejestracji</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr style="border-bottom: solid 1px #e5e5e5;">
                            <td>{{ $user->id }}</td>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>
                                {{ $user->email }} <br>
                                <small style="color: gray;">PESEL: {{ $user->pesel ?? 'Brak' }}</small>
                            </td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span style="background: #333; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.8em;">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td>
                                @if($user->created_by == $user->id)
                                    Rejestracja samodzielna
                                @else
                                    ID: {{ $user->created_by }}
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </article>
@endsection