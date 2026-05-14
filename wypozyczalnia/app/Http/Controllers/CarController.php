<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarClass;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::with('carClass')->where('is_available', true);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('brand', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%");
            });
        }

        if ($request->filled('car_class_id')) {
            $query->where('car_class_id', $request->input('car_class_id'));
        }

        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->input('max_price'));
        }

        if ($request->filled('sort')) {
            if ($request->input('sort') == 'price_asc') {
                $query->orderBy('price_per_day', 'asc');
            } elseif ($request->input('sort') == 'price_desc') {
                $query->orderBy('price_per_day', 'desc');
            }
        } else {
            $query->latest(); 
        }

        $cars = $query->paginate(8)->withQueryString();

        $carClasses = CarClass::where('is_active', true)->get();

        return view('cars.index', compact('cars', 'carClasses'));
    }
}