@extends('layouts.strongly')

@section('content')
    <article class="box post">
        <header>
            <h2>Harmonogram <strong>Rezerwacji</strong></h2>
            <p>Podgląd wszystkich wynajmów klientów</p>
        </header>

        <div class="table-wrapper">
            <table class="alt" style="width: 100%; text-align: left;">
                <thead>
                    <tr>
                        <th>Klient (Email)</th>
                        <th>Samochód (Rejestracja)</th>
                        <th>Od kiedy</th>
                        <th>Do kiedy</th>
                        <th>Wartość</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $res)
                        <tr>
                            <td>
                                <strong>{{ $res->user->name }}</strong><br>
                                <small>{{ $res->user->email }}</small>
                            </td>
                            <td>
                                <strong>{{ $res->car->brand }} {{ $res->car->model }}</strong><br>
                                <small>{{ $res->car->registration_number }}</small>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($res->start_date)->format('d.m.Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($res->end_date)->format('d.m.Y') }}</td>
                            <td><span style="color: #e97770; font-weight: bold;">{{ $res->total_price }} PLN</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
@endsection