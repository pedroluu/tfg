<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('Usuario', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Autenticación exitosa para admin
            return redirect()->intended('/dashboard');
        }

        if (Auth::guard('cliente')->attempt($credentials)) {
            // Autenticación exitosa para cliente
            return redirect()->intended('/dashboard');
        }

        // Autenticación fallida
        return redirect()->back()->withInput($request->only('Usuario'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
