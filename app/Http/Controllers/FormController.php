<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nombre' => ['required', 'string', 'max:255'],
            'Apellidos' => ['required', 'string', 'max:255'],
            'FechaNac' => ['required', 'date'],
            'Cuota' => ['required', 'numeric'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:cliente'],
            'Usuario' => ['required', 'string', 'max:50', 'unique:cliente'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Cliente::create([
            'Nombre' => $data['Nombre'],
            'Apellidos' => $data['Apellidos'],
            'FechaNac' => $data['FechaNac'],
            'Cuota' => $data['Cuota'],
            'Email' => $data['Email'],
            'Usuario' => $data['Usuario'],
            'password' => ($data['password']),
            'gimnasio_id' => 1, // Ajusta según tu lógica
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('form')
                ->withErrors($validator)
                ->withInput();
        }

        $this->create($request->all());

        return redirect()->route('form')->with('success', 'Registro completado con éxito.');
    }
}
