<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Clase;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function reservarClase(Request $request)
    {
        $request->validate([
            'clase_id' => 'required|exists:clase,id',
        ]);

        $clase = Clase::find($request->clase_id);

        if ($clase->capacidad > $clase->reservas()->count()) {
            Reserva::create([
                'cliente_id' => Auth::id(),
                'clase_id' => $request->clase_id,
                'FechaReserva' => now(),
            ]);

            return redirect()->back()->with('success', 'Clase reservada exitosamente.');
        } else {
            return redirect()->back()->with('error', 'La clase está llena.');
        }
    }
}
