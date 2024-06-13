<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Clase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function reservarClase(Request $request)
    {
        $request->validate([
            'clase_id' => 'required|exists:clase,id',
        ]);

        $cliente_id = Auth::guard('client')->id();
        $clase_id = $request->input('clase_id');

        // Verificar si ya existe una reserva para el cliente y la clase
        $reservaExistente = Reserva::where('cliente_id', $cliente_id)
            ->where('clase_id', $clase_id)
            ->first();

        if ($reservaExistente) {
            return redirect()->back()->with('error', 'Ya tienes una reserva para esta clase.');
        }

        DB::transaction(function () use ($cliente_id, $clase_id) {
            $clase = Clase::find($clase_id);

            if ($clase->capacidad > 0) {
                Reserva::create([
                    'cliente_id' => $cliente_id,
                    'clase_id' => $clase_id,
                    'FechaReserva' => now(),
                ]);

                $clase->decrement('capacidad');
            } else {
                throw new \Exception('La clase está llena.');
            }
        });

        return redirect()->back()->with('success', 'Clase reservada exitosamente. Para consultar sus clases: Cuenta->Perfil');
    }

    public function cancelarReserva($id)
    {
        DB::transaction(function () use ($id) {
            $reserva = Reserva::where('cliente_id', Auth::guard('client')->id())
                ->where('id', $id)
                ->first();

            if ($reserva) {
                $clase = Clase::find($reserva->clase_id);
                $clase->increment('capacidad');

                $reserva->delete();
            } else {
                throw new \Exception('Reserva no encontrada.');
            }
        });

        return redirect()->back()->with('success', 'Reserva cancelada exitosamente.');
    }
}
