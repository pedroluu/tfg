<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:cliente',
            'Usuario' => 'required|string|max:50|unique:cliente',
            'password' => 'required|string|min:8',
            'FechaNac' => 'required|date',
            'Cuota' => 'required|numeric',
        ]);

        Cliente::create([
            'Nombre' => $request->Nombre,
            'Apellidos' => $request->Apellidos,
            'Email' => $request->Email,
            'Usuario' => $request->Usuario,
            'password' => Hash::make($request->password),
            'FechaNac' => $request->FechaNac,
            'Cuota' => $request->Cuota,
            'gimnasio_id' => 1,
        ]);

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente creado correctamente');
    }

    public function update(Request $request, Cliente $cliente)
    {
        try {
            Log::info('Iniciando actualización del cliente', ['cliente_id' => $cliente->id]);

            Log::debug('Datos de la solicitud recibida:', $request->all());

            $request->validate([
                'Nombre' => 'required|string|max:255',
                'Apellidos' => 'required|string|max:255',
                'password' => 'nullable|string|min:8',
                'FechaNac' => 'required|date',
                'Cuota' => 'required|numeric',
            ]);

            Log::debug('Datos validados correctamente', $request->all());

            $cliente->Nombre = $request->Nombre;
            $cliente->Apellidos = $request->Apellidos;
            $cliente->FechaNac = $request->FechaNac;
            $cliente->Cuota = $request->Cuota;

            if ($request->filled('password')) {
                $cliente->password = Hash::make($request->password);
            }

            $cliente->save();

            Log::info('Cliente actualizado correctamente', ['cliente_id' => $cliente->id]);

            return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado correctamente');
        } catch (\Exception $e) {
            Log::error('Error al actualizar cliente', ['cliente_id' => $cliente->id, 'message' => $e->getMessage()]);
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al actualizar el cliente.']);
        }
    }



    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        // Eliminar reservas asociadas al cliente
        Reserva::where('cliente_id', $id)->delete();

        $cliente->delete();

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }
}
