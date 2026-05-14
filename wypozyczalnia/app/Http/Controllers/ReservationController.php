<?php
namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create(Car $car)
    {
        $reservations = Reservation::where('car_id', $car->id)
            ->where('end_date', '>=', Carbon::today())
            ->orderBy('start_date', 'asc')
            ->get();

        return view('reservations.create', compact('car', 'reservations'));
    }

    public function store(Request $request, Car $car)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today', 
            'end_date' => 'required|date|after:start_date',       
        ], [
            'start_date.after_or_equal' => 'BŁĄD: Data wypożyczenia nie może być w przeszłości!',
            'end_date.after' => 'BŁĄD: Data zwrotu musi być późniejsza niż data odbioru!',
        ]);

        $isReserved = Reservation::where('car_id', $car->id)
            ->where('start_date', '<=', $request->end_date)
            ->where('end_date', '>=', $request->start_date)
            ->exists();

        if ($isReserved) {
            return back()->withInput()->withErrors(['error' => 'Przepraszamy, ten pojazd jest już zarezerwowany w wybranym terminie. Wybierz inne daty.']);
        }

        $days = Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->end_date));
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->car_id = $car->id;
        $reservation->start_date = $request->start_date;
        $reservation->end_date = $request->end_date;
        $reservation->total_price = $days * $car->price_per_day;
        
        $reservation->created_by = Auth::id();
        $reservation->updated_by = Auth::id();
        $reservation->save();

        return redirect()->route('cars.index')->with('success', 'Sukces! Zarezerwowano pojazd: ' . $car->brand . ' ' . $car->model);
    }

    public function calculatePrice(Request $request, Car $car)
    {
        if (!$request->start_date || !$request->end_date) {
            return response()->json(['error' => 'Brak dat'], 400);
        }

        try {
            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);
            
            if ($start->isBefore(Carbon::today()) || $end->isBefore($start) || $start->equalTo($end)) {
                 return response()->json(['error' => 'Niepoprawne daty'], 400);
            }

            $isReserved = Reservation::where('car_id', $car->id)
                ->where('start_date', '<=', $end->format('Y-m-d'))
                ->where('end_date', '>=', $start->format('Y-m-d'))
                ->exists();

            if ($isReserved) {
                 return response()->json(['error' => 'Pojazd niedostępny w tym terminie!'], 409);
            }

            $days = $start->diffInDays($end);
            return response()->json([
                'days' => $days,
                'total_price' => $days * $car->price_per_day
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Błąd obliczeń'], 500);
        }
    }
    public function userIndex()
    {
        $userReservations = Reservation::where('user_id', Auth::id())
            ->with('car')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('reservations.index', compact('userReservations'));
    }
}