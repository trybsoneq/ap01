@extends('layouts.strongly')

@section('content')
    <article class="box post">
        <header>
            <h2>Edycja: <strong>{{ $car->brand }} {{ $car->model }}</strong></h2>
        </header>

        <form action="{{ route('employee.cars.update', $car->id) }}" method="POST">
            @csrf
            <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
                <div style="flex: 1; min-width: 200px;">
                    <label><strong>Marka:</strong></label>
                    <input type="text" name="brand" value="{{ $car->brand }}" required style="width: 100%; padding: 10px;">
                </div>
                <div style="flex: 1; min-width: 200px;">
                    <label><strong>Model:</strong></label>
                    <input type="text" name="model" value="{{ $car->model }}" required style="width: 100%; padding: 10px;">
                </div>
            </div>

            <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
                <div style="flex: 1; min-width: 200px;">
                    <label><strong>Cena za dzień (PLN):</strong></label>
                    <input type="number" step="0.01" name="price_per_day" value="{{ $car->price_per_day }}" required style="width: 100%; padding: 10px;">
                </div>
                <div style="flex: 1; min-width: 200px;">
                    <label><strong>Klasa (Katalog):</strong></label>
                    <select name="car_class_id" style="width: 100%; padding: 10px;">
                        @foreach($carClasses as $class)
                            <option value="{{ $class->id }}" {{ $car->car_class_id == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="button">Zapisz zmiany</button>
            <a href="{{ route('employee.cars') }}" class="button alt">Anuluj</a>
        </form>
    </article>
@endsection