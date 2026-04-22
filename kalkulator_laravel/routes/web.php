<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;


Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction']);
Route::post('/logout', [AuthController::class, 'logoutAction'])->name('logout');

Route::get('/', [CreditController::class, 'index']);
Route::post('/', [CreditController::class, 'calc']);

Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
Route::delete('/accounts/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');
Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');
Route::get('/accounts/{id}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
Route::put('/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');

Route::middleware('auth')->group(function () {
    
    Route::get('/admin', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Tylko administrator ma tutaj dostęp!');
        }
        return "<h1>Witaj w Tajnym Panelu Administratora!</h1><a href='".url('/')."'>Wróć do kalkulatora</a>";
    });

});