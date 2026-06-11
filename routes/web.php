<?php

use Illuminate\Support\Facades\Route;

// Cambia 'welcome' por el nombre de tu archivo de vista (ej. 'inicio' o 'index')
Route::get('/', function () {
    return view('inicio'); 
});