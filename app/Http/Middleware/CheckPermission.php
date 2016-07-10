<?php

namespace App\Http\Middleware;

use Closure;
use Flash;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        if (!app('Illuminate\Contracts\Auth\Guard')->guest()) {

            if ($request->user()->can($permission)) {
                
                return $next($request);
            }else{
                Flash::error('No autorizado.');
                return $request->ajax ? response('No autorizado.', 401) : redirect(route('inicio'));
            }
        }else{
            Flash::error('Debe iniciar sesión.');
            return $request->ajax ? response('Debe iniciar sesión.', 401) : redirect(route('inicio'));
        }
    }
}
