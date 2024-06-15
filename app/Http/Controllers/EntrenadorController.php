<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Models\Clase;
use App\Models\Reserva;
use App\Http\Requests\EntrenadorRequest;

/**
 * Class EntrenadorController
 * @package App\Http\Controllers
 */
class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entrenadors = Entrenador::paginate();

        return view('entrenador.index', compact('entrenadors'))
            ->with('i', (request()->input('page', 1) - 1) * $entrenadors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entrenador = new Entrenador();
        return view('entrenador.create', compact('entrenador'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntrenadorRequest $request)
    {
        Entrenador::create($request->validated());

        return redirect()->route('admin.entrenadors.index')
            ->with('success', 'Entrenador created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $entrenador = Entrenador::find($id);

        return view('entrenador.show', compact('entrenador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entrenador = Entrenador::find($id);

        return view('entrenador.edit', compact('entrenador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntrenadorRequest $request, Entrenador $entrenador)
    {
        $entrenador->update($request->validated());

        return redirect()->route('admin.entrenadors.index')
            ->with('success', 'Entrenador updated successfully');
    }

    public function destroy($id)
    {
        $entrenador = Entrenador::findOrFail($id);

        // No es necesario eliminar las clases y reservas manualmente porque la eliminación en cascada se encargará de ello
        $entrenador->delete();

        return redirect()->route('admin.entrenadors.index')->with('success', 'Entrenador eliminado con éxito.');
    }




}
