<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class PermisoAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->permiso())
        return $next($request);
        return redirect('/')->with('mensaje', 'No tiene permiso para ingresar a esta sección');
    }

    private function permiso(){
        return session()->get('rol_nombre') == 'administrador';
    }
}
