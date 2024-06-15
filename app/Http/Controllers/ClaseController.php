<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Http\Requests\ClaseRequest;

/**
 * Class ClaseController
 * @package App\Http\Controllers
 */
class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clases = Clase::paginate();

        return view('clase.index', compact('clases'))
            ->with('i', (request()->input('page', 1) - 1) * $clases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clase = new Clase();
        return view('clase.create', compact('clase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClaseRequest $request)
    {
        Clase::create($request->validated());

        return redirect()->route('clases.index')
            ->with('success', 'Clase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clase = Clase::find($id);

        return view('clase.show', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clase = Clase::find($id);

        return view('clase.edit', compact('clase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClaseRequest $request, Clase $clase)
    {
        $clase->update($request->validated());

        return redirect()->route('admin.clases.index')
            ->with('success', 'Clase updated successfully');
    }

    public function destroy($id)
    {
        Clase::find($id)->delete();

        return redirect()->route('admin.clases.index')
            ->with('success', 'Clase deleted successfully');
    }
}
