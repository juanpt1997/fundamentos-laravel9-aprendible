<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            // Login fail
            // ? Podemos agregar mensajes traducibles
            throw ValidationException::withMessages([
                /* 'email' => 'You shall not pass!' */
                'email' => __('auth.failed')
            ]);
        }

        // Login success
        // Por seguridad hacemos esto
        $request->session()->regenerate();
        
        // Redireccionamos a la url prevista, la que quiso acceder en un principio
        return redirect()
            ->intended()
            ->with('status', 'You are logged in');
    }

    public function destroy(Request $request)
    {
        // Cerramos sesión
        Auth::guard('web')->logout();
        // Invalidamos la sesión
        $request->session()->invalidate();
        // Regeneramos token csrf
        $request->session()->regenerateToken();
        // Retornamos a la ruta
        return to_route('login')->with('status', 'You are logged out!');
    }
}
