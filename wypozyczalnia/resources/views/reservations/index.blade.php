@extends('layouts.strongly')

@section('content')
    <article class="box post">
        <header>
            <h2>Twoje <strong>Rezerwacje</strong></h2>
            <p>Lista wszystkich Twoich wynajmów w naszym systemie</p>
        </header>

        <div class="table-wrapper">
            <table class="alt" style="width: 100%; text-align: left;">
                <thead>
                    <tr>
                        <th>Samochód</th>
                        <th>Data odbioru</th>
                        <th>Data zwrotu</th>
                        <th>Cena całkowita</th>
                        <th>Data rezerwacji</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($userReservations as $res)
                        <tr>
                            <td>
                                <strong>{{ $res->car->brand }} {{ $res->car->model }}</strong>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($res->start_date)->format('d.m.Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($res->end_date)->format('d.m.Y') }}</td>
                            <td><span style="font-weight: bold; color: #e97770;">{{ $res->total_price }} PLN</span></td>
                            <td>{{ $res->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center;">Nie masz jeszcze żadnych rezerwacji.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div style="margin-top: 20px;">
            <a href="{{ route('cars.index') }}" class="button">Wypożycz kolejne auto</a>
        </div>
    </article>
@endsection