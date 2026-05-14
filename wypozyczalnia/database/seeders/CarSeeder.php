<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarClass;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $suv = CarClass::create(['name' => 'SUV', 'description' => 'Duże, bezpieczne i pakowne auta.']);
        $kompakt = CarClass::create(['name' => 'Kompakt', 'description' => 'Ekonomiczne i zwinne auta do miasta.']);
        $premium = CarClass::create(['name' => 'Premium', 'description' => 'Luksusowe auta dla wymagających.']);

        $adminId = 1;

        $cars = [
            // === KOMPAKTY ===
            ['class' => $kompakt->id, 'brand' => 'Skoda', 'model' => 'Fabia', 'reg' => 'KR54321', 'year' => 2022, 'price' => 120.00],
            ['class' => $kompakt->id, 'brand' => 'Toyota', 'model' => 'Yaris', 'reg' => 'WA99887', 'year' => 2023, 'price' => 130.00],
            ['class' => $kompakt->id, 'brand' => 'Volkswagen', 'model' => 'Polo', 'reg' => 'PO11223', 'year' => 2021, 'price' => 115.00],
            ['class' => $kompakt->id, 'brand' => 'Hyundai', 'model' => 'i20', 'reg' => 'GD44556', 'year' => 2023, 'price' => 125.00],
            ['class' => $kompakt->id, 'brand' => 'Renault', 'model' => 'Clio', 'reg' => 'DW77889', 'year' => 2022, 'price' => 110.00],
            ['class' => $kompakt->id, 'brand' => 'Opel', 'model' => 'Corsa', 'reg' => 'LU55443', 'year' => 2024, 'price' => 140.00],
            ['class' => $kompakt->id, 'brand' => 'Ford', 'model' => 'Focus', 'reg' => 'CB12345', 'year' => 2023, 'price' => 145.00], // NOWE
            ['class' => $kompakt->id, 'brand' => 'Mazda', 'model' => '3', 'reg' => 'ZS54321', 'year' => 2024, 'price' => 155.00], // NOWE

            // === SUVY ===
            ['class' => $suv->id, 'brand' => 'Toyota', 'model' => 'RAV4', 'reg' => 'WA12345', 'year' => 2023, 'price' => 250.00],
            ['class' => $suv->id, 'brand' => 'Kia', 'model' => 'Sportage', 'reg' => 'KR88776', 'year' => 2024, 'price' => 260.00],
            ['class' => $suv->id, 'brand' => 'Nissan', 'model' => 'Qashqai', 'reg' => 'PO33445', 'year' => 2022, 'price' => 220.00],
            ['class' => $suv->id, 'brand' => 'Hyundai', 'model' => 'Tucson', 'reg' => 'GD66778', 'year' => 2023, 'price' => 245.00],
            ['class' => $suv->id, 'brand' => 'Volkswagen', 'model' => 'Tiguan', 'reg' => 'DW22334', 'year' => 2024, 'price' => 270.00],
            ['class' => $suv->id, 'brand' => 'Dacia', 'model' => 'Duster', 'reg' => 'LU99001', 'year' => 2022, 'price' => 180.00],
            ['class' => $suv->id, 'brand' => 'Volvo', 'model' => 'XC60', 'reg' => 'WZ77777', 'year' => 2024, 'price' => 320.00], // NOWE
            ['class' => $suv->id, 'brand' => 'Peugeot', 'model' => '3008', 'reg' => 'KR11122', 'year' => 2023, 'price' => 240.00], // NOWE

            // === PREMIUM ===
            ['class' => $premium->id, 'brand' => 'BMW', 'model' => 'Seria 5', 'reg' => 'PO99999', 'year' => 2024, 'price' => 450.00],
            ['class' => $premium->id, 'brand' => 'Mercedes', 'model' => 'Klasa E', 'reg' => 'WA00001', 'year' => 2023, 'price' => 480.00],
            ['class' => $premium->id, 'brand' => 'Audi', 'model' => 'A6', 'reg' => 'KR77777', 'year' => 2024, 'price' => 460.00],
            ['class' => $premium->id, 'brand' => 'Volvo', 'model' => 'S90', 'reg' => 'GD55555', 'year' => 2023, 'price' => 430.00],
            ['class' => $premium->id, 'brand' => 'Lexus', 'model' => 'ES', 'reg' => 'DW11111', 'year' => 2024, 'price' => 500.00],
            ['class' => $premium->id, 'brand' => 'Porsche', 'model' => 'Panamera', 'reg' => 'LU33333', 'year' => 2023, 'price' => 800.00],
            ['class' => $premium->id, 'brand' => 'Tesla', 'model' => 'Model S', 'reg' => 'EE99999', 'year' => 2024, 'price' => 600.00], // NOWE
            ['class' => $premium->id, 'brand' => 'Jaguar', 'model' => 'XF', 'reg' => 'WA88888', 'year' => 2022, 'price' => 410.00], // NOWE
        ];

        foreach ($cars as $car) {
            Car::create([
                'car_class_id' => $car['class'],
                'brand' => $car['brand'],
                'model' => $car['model'],
                'registration_number' => $car['reg'],
                'production_year' => $car['year'],
                'price_per_day' => $car['price'],
                'is_available' => true,
                'created_by' => $adminId,
            ]);
        }
    }
}