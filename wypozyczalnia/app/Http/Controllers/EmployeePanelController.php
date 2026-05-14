<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarClass;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeePanelController extends Controller
{
    private function checkAccess()
    {
        if (!Auth::user()->roles->whereIn('name', ['Pracownik', 'Administrator'])->count()) {
            abort(403, 'Brak dostępu. Panel przeznaczony tylko dla obsługi wypożyczalni.');
        }
    }

    public function reservations()
    {
        $this->checkAccess();

        $reservations = Reservation::with(['car', 'user'])->orderBy('start_date', 'asc')->get();

        return view('employee.reservations', compact('reservations'));
    }

    public function cars()
    {
        $this->checkAccess();
        $cars = Car::with('carClass')->get();
        return view('employee.cars_index', compact('cars'));
    }

    public function editCar(Car $car)
    {
        $this->checkAccess();
        $carClasses = CarClass::where('is_active', true)->get();
        return view('employee.cars_edit', compact('car', 'carClasses'));
    }

    public function updateCar(Request $request, Car $car)
    {
        $this->checkAccess();

        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price_per_day' => 'required|numeric|min:0',
            'car_class_id' => 'required|exists:car_classes,id',
        ]);

        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->price_per_day = $request->price_per_day;
        $car->car_class_id = $request->car_class_id;

        $car->updated_by = Auth::id(); 
        
        $car->save();

        return redirect()->route('employee.cars')->with('success', 'Pomyślnie zaktualizowano dane pojazdu!');
    }
}