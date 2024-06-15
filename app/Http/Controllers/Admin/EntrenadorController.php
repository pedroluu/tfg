<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entrenador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EntrenadorController extends Controller
{
    public function index()
    {
        $entrenadores = Entrenador::all();
        return view('admin.entrenadores', compact('entrenadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIF' => 'required|string|max:50|unique:entrenador',
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'FechaNac' => 'required|date',
            'Sueldo' => 'required|numeric',
        ]);

        Entrenador::create([
            'NIF' => $request->NIF,
            'Nombre' => $request->Nombre,
            'Apellidos' => $request->Apellidos,
            'FechaNac' => $request->FechaNac,
            'Sueldo' => $request->Sueldo,
            'gimnasio_id' => 1,
        ]);

        return redirect()->route('admin.entrenadores.index')->with('success', 'Entrenador creado correctamente');
    }

    public function update(Request $request, $id)
    {
        try {
            $entrenador = Entrenador::findOrFail($id);

            Log::info('Iniciando actualización del entrenador', ['entrenador_id' => $entrenador->id]);

            $request->validate([
                'Nombre' => 'required|string|max:255',
                'Apellidos' => 'required|string|max:255',
                'FechaNac' => 'required|date',
                'Sueldo' => 'required|numeric',
            ]);

            $entrenador->update($request->only(['Nombre', 'Apellidos', 'FechaNac', 'Sueldo']));

            Log::info('Entrenador actualizado correctamente', ['entrenador_id' => $entrenador->id]);

            return redirect()->route('admin.entrenadores.index')->with('success', 'Entrenador actualizado correctamente');
        } catch (\Exception $e) {
            Log::error('Error al actualizar entrenador', ['entrenador_id' => $id, 'message' => $e->getMessage()]);
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al actualizar el entrenador.']);
        }
    }


    public function destroy($id)
    {
        $entrenador = Entrenador::findOrFail($id);
        $entrenador->delete();

        return redirect()->route('admin.entrenadores.index')->with('success', 'Entrenador eliminado con éxito.');
    }
}
