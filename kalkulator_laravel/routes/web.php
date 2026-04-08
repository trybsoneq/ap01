<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditController;

Route::get('/', [CreditController::class, 'index']);

Route::post('/', [CreditController::class, 'calc']);