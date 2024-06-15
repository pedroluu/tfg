<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Reserva;
use App\Http\Requests\ClienteRequest;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::paginate();

        return view('cliente.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        Cliente::create($request->validated());

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente updated successfully');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        // Obtener las reservas asociadas al cliente
        $reservas = Reserva::where('cliente_id', $id)->get();

        // Actualizar la capacidad de la clase asociada a cada reserva antes de eliminarla
        foreach ($reservas as $reserva) {
            $clase = $reserva->clase;
            if ($clase) {
                $clase->capacidad += 1; // Ajusta según la lógica de tu aplicación
                $clase->save();
            }
        }

        // Eliminar reservas asociadas al cliente
        Reserva::where('cliente_id', $id)->delete();

        // Eliminar el cliente
        $cliente->delete();

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }
}
