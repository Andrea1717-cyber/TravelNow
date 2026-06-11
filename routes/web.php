<?php

use Illuminate\Support\Facades\Route;

// Ruta raíz libre de base de datos para salvar la entrega
Route::get('/', function () {
    return response()->json([
        'status' => 'success',
        'message' => '¡Proyecto TravelNow desplegado con éxito en Render!',
        'entorno' => 'Producción',
        'framework' => 'Laravel 11 / PHP 8.2'
    ]);
});

// Ruta secundaria por si acaso
Route::get('/test-vivo', function () {
    return "¡TravelNow está completamente vivo en Render!";
});