<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::guard('client')->user();
        return view('client.dashboard', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('client')->user();

        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clientes,email,' . $user->id,
            'FechaNac' => 'required|date',
        ]);

        // Actualizar el perfil del usuario
        $user->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'FechaNac' => $request->FechaNac,
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Perfil actualizado correctamente.');
    }
}
