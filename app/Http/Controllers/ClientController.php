<?php
// app/Http/Controllers/ClientController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;

class ClientController extends Controller
{
    public function index()
    {
        // Obtén todas las clases o aplica algún filtro según tu necesidad
        $clases = Clase::all();

        // Pasa las clases a la vista
        return view('client.dashboard', compact('clases'));
    }
}
