<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Reserva;

class HotelController extends Controller
{
    public function index()
    {
        // Consumir API de prueba
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $hoteles = $response->json();

        // Agregar datos extra simulados
        foreach ($hoteles as $i => &$hotel) {
            $hotel['ciudad'] = ['Bogotá', 'Medellín', 'Cali', 'Cartagena'][rand(0,3)];
            $hotel['precio'] = rand(100000, 500000);
            $hotel['habitaciones'] = rand(5, 50);
            $hotel['calificacion'] = rand(3, 5);
            $hotel['imagen'] = "https://picsum.photos/seed/hotel{$i}/200/120";
        }

        // Traer reservas guardadas en BD
        $reservas = Reserva::all();

        return view('hoteles.index', compact('hoteles', 'reservas'));
    }

    public function store(Request $request)
    {
        // Guardar reserva en BD
        Reserva::create([
            'hotel' => $request->input('hotel'),
            'personas' => $request->input('personas'),
        ]);

        return redirect('/')->with('success', 'Reserva registrada correctamente');
    }
}
