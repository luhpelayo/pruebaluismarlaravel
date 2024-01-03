<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Método para manejar la respuesta después del inicio de sesión
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);
    
        return response()->json(['message' => 'Login successful', 'user' => $this->guard()->user()]);
    }

    // Método para manejar la respuesta después del inicio de sesión fallido
    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
