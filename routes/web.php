<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', [HotelController::class, 'index']); // Página principal
Route::post('/reservas', [HotelController::class, 'store']);
