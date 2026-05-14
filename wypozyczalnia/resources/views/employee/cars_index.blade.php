@extends('layouts.strongly')

@section('content')
    <article class="box post">
        <header>
            <h2>Zarządzanie <strong>Flotą</strong></h2>
            <p>Wybierz pojazd, aby zaktualizować jego dane</p>
        </header>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                <strong>✅ {{ session('success') }}</strong>
            </div>
        @endif

        <div class="table-wrapper">
            <table class="alt" style="width: 100%; text-align: left;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marka i Model</th>
                        <th>Klasa</th>
                        <th>Cena / Dzień</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td><strong>{{ $car->brand }} {{ $car->model }}</strong></td>
                            <td>{{ $car->carClass->name }}</td>
                            <td>{{ $car->price_per_day }} PLN</td>
                            <td>
                                <a href="{{ route('employee.cars.edit', $car->id) }}" class="button small">Edytuj</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
@endsection