@extends('layouts.strongly')

@section('content')
    <article class="box post">
        <header>
            <h2>Nasza <strong>Flota</strong></h2>
            <p>Znajdź idealny samochód dla siebie</p>
        </header>

        <section style="background: #f4f4f4; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
            <form action="{{ route('cars.index') }}" method="GET" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
                
                <div style="flex: 1; min-width: 150px;">
                    <label for="search"><strong>Szukaj:</strong></label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Marka / Model..." style="width: 100%; padding: 10px;">
                </div>

                <div style="flex: 1; min-width: 150px;">
                    <label for="car_class_id"><strong>Kategoria:</strong></label>
                    <select name="car_class_id" id="car_class_id" style="width: 100%; padding: 10px;">
                        <option value="">-- Wszystkie --</option>
                        @foreach($carClasses as $class)
                            <option value="{{ $class->id }}" {{ request('car_class_id') == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="flex: 1; min-width: 120px;">
                    <label for="max_price"><strong>Cena max (PLN):</strong></label>
                    <input type="text" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="Np. 200" style="width: 100%; padding: 10px;">
                </div>

                <div style="flex: 1; min-width: 180px;">
                    <label for="sort"><strong>Sortowanie:</strong></label>
                    <select name="sort" id="sort" style="width: 100%; padding: 10px;">
                        <option value="">Domyślne</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Cena: od najniższej</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Cena: od najwyższej</option>
                    </select>
                </div>

                <div style="flex: 1; min-width: 200px; display: flex; gap: 10px;">
                    <button type="submit" class="button" style="padding: 10px 20px; flex: 1;">Zastosuj</button>
                    <a href="{{ route('cars.index') }}" class="button alt" style="padding: 10px 20px; flex: 1; text-align: center;">Wyczyść</a>
                </div>
            </form>
        </section>

        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            @forelse($cars as $car)
                <div style="flex: 1; min-width: 300px; border: 1px solid #ddd; padding: 20px; border-radius: 8px; background: white;">
                    <h3>{{ $car->brand }} {{ $car->model }}</h3>
                    <p>
                        <strong>Klasa:</strong> {{ $car->carClass->name }}<br>
                        <strong>Rocznik:</strong> {{ $car->production_year }}<br>
                        <strong>Cena za dzień:</strong> <span style="color: #e97770; font-size: 1.2em; font-weight: bold;">{{ $car->price_per_day }} PLN</span>
                    </p>
                    <a href="{{ route('reservations.create', $car->id) }}" class="button small">Zarezerwuj</a>
                </div>
            @empty
                <p>Niestety, nie znaleźliśmy samochodów spełniających Twoje kryteria.</p>
            @endforelse
        </div>

        <div style="margin-top: 40px; text-align: center;">
            {{ $cars->links() }}
        </div>

    </article>
    <style>
        nav[role="navigation"] {
            margin-top: 40px;
            text-align: center;
        }
        nav[role="navigation"] svg {
            width: 25px;
            height: 25px;
            display: inline-block;
            vertical-align: middle;
        }
        nav[role="navigation"] .sm\:hidden {
            display: none;
        }
        nav[role="navigation"] p {
            margin-top: 15px;
            color: #888;
        }
        nav[role="navigation"] a, nav[role="navigation"] span {
            padding: 5px 15px;
            text-decoration: none;
        }
    </style>
@endsection