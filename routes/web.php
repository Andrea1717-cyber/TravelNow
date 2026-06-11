<?php

use Illuminate\Support\Facades\Route;

// Forzar a que cargue la vista sin consultas a base de datos para la entrega
Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/test-vivo', function () {
    return "¡Laravel está completamente vivo en Render!";
});