<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EmployeePanelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/katalog', [CarController::class, 'index'])->name('cars.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/rezerwuj/{car}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/rezerwuj/{car}', [ReservationController::class, 'store'])->name('reservations.store');
    Route::post('/ajax/kalkuluj-cene/{car}', [ReservationController::class, 'calculatePrice'])->name('ajax.price');
    Route::get('/moje-rezerwacje', [ReservationController::class, 'userIndex'])->name('reservations.userIndex');

    Route::get('/panel-pracownika/rezerwacje', [EmployeePanelController::class, 'reservations'])->name('employee.reservations');
    Route::get('/panel-pracownika/auta', [EmployeePanelController::class, 'cars'])->name('employee.cars');
    Route::get('/panel-pracownika/auta/{car}/edytuj', [EmployeePanelController::class, 'editCar'])->name('employee.cars.edit');
    Route::post('/panel-pracownika/auta/{car}/edytuj', [EmployeePanelController::class, 'updateCar'])->name('employee.cars.update');
});

require __DIR__.'/auth.php';
