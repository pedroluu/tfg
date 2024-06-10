<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

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
            'email' => 'required|string|email|max:255|unique:cliente,Email,' . $user->id,
            'FechaNac' => 'required|date',
        ]);

        // Actualizar el perfil del usuario
        $user->Nombre = $request->nombre;
        $user->Apellidos = $request->apellidos;
        $user->Email = $request->email;
        $user->FechaNac = $request->FechaNac;
        $user->save();

        return redirect()->route('client.dashboard')->with('success', 'Perfil actualizado correctamente.');
    }
}
