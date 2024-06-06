<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Cliente;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'Usuario' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('Usuario', 'password');

        if ($this->attemptLogin($credentials, 'admin')) {
            return redirect()->intended('/admin/dashboard');
        }

        if ($this->attemptLogin($credentials, 'client')) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'Usuario' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    protected function attemptLogin($credentials, $guard)
    {
        $user = null;

        if ($guard == 'admin') {
            $user = Admin::where('Usuario', $credentials['Usuario'])->first();
        } else {
            $user = Cliente::where('Usuario', $credentials['Usuario'])->first();
        }

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::guard($guard)->login($user);
            return true;
        }

        return false;
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        if (Auth::guard('client')->check()) {
            Auth::guard('client')->logout();
        }

        return redirect('/');
    }
}
