@extends('layouts.strongly')

@section('content')
    <article class="box post">
        <header>
            <h2>Rezerwacja: <strong>{{ $car->brand }} {{ $car->model }}</strong></h2>
            <p>Cena za dzień: {{ $car->price_per_day }} PLN</p>
        </header>
        <section style="margin-bottom: 25px;">
            @if($reservations->count() > 0)
                <div style="background: #fff3cd; color: #856404; padding: 20px; border-radius: 8px; border-left: 5px solid #ffeeba;">
                    <h3 style="margin-bottom: 10px; font-size: 1.2em;">⚠️ Uwaga! Pojazd jest już zarezerwowany w terminach:</h3>
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($reservations as $res)
                            <li style="margin-bottom: 5px;">
                                Od: <strong>{{ \Carbon\Carbon::parse($res->start_date)->format('d.m.Y') }}</strong> 
                                do: <strong>{{ \Carbon\Carbon::parse($res->end_date)->format('d.m.Y') }}</strong>
                            </li>
                        @endforeach
                    </ul>
                    <p style="margin-top: 10px; font-size: 0.9em;">Prosimy o wybór innych dat.</p>
                </div>
            @else
                <div style="background: #d4edda; color: #155724; padding: 20px; border-radius: 8px; border-left: 5px solid #c3e6cb;">
                    <h3 style="margin: 0; font-size: 1.2em;">✅ Pojazd jest obecnie całkowicie wolny!</h3>
                    <p style="margin: 0; font-size: 0.9em;">Możesz wybierać z dowolnych dat w przyszłości.</p>
                </div>
            @endif
        </section>
   
        @if ($errors->any())
            <div style="background: #ffdddd; color: #a30000; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservations.store', $car->id) }}" method="POST">
            @csrf
            
            <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                    <label for="start_date"><strong>Data odbioru:</strong></label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required style="width: 100%; padding: 10px;">
                </div>

                <div style="flex: 1;">
                    <label for="end_date"><strong>Data zwrotu:</strong></label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required style="width: 100%; padding: 10px;">
                </div>
            </div>

            <div id="dynamic-price-box" style="margin-bottom: 20px; font-size: 1.2em; min-height: 30px;">
                Wybierz daty, aby zobaczyć koszt rezerwacji...
            </div>

            <button type="submit" class="button">Potwierdź rezerwację</button>
            <a href="{{ route('cars.index') }}" class="button alt">Anuluj</a>
        </form>
    </article>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            $('#start_date, #end_date').on('change', function() {
                let startDate = $('#start_date').val();
                let endDate = $('#end_date').val();

                if(startDate && endDate) {
                    
                    $('#dynamic-price-box').html('<span style="color: gray;">Obliczam...</span>');

                    $.ajax({
                        url: "{{ route('ajax.price', $car->id) }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            start_date: startDate,
                            end_date: endDate
                        },
                        success: function(response) {
                            $('#dynamic-price-box').html(
                                '<span style="color: #2e8b57;">Całkowity koszt (za ' + response.days + ' dni): <strong>' + response.total_price + ' PLN</strong></span>'
                            );
                        },
                        error: function(xhr) {
                            $('#dynamic-price-box').html(
                                '<span style="color: red;">Wybierz prawidłowe daty w przyszłości!</span>'
                            );
                        }
                    });
                }
            });

        });
    </script>
@endsection