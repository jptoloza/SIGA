<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthSiga
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si ya hay una sesión activa
        if (Session::has('user_id')) {
           return $next($request);
        } else {
            return redirect('/'); // Redirige a la página de inicio de sesión si el usuario no está autenticado.
        }
    }
}
