<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;

class HomeController extends Controller
{
    public function __invoke()
    {
        
        return view('home');
    }
}
