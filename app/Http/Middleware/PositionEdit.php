<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class PositionEdit
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
        if(!Gate::allows('positionEdit')){
            $refirect = redirect()->intended('/admin/accessdenied');
            return $refirect;
            //echo"Разрешено!";
        }
        return $next($request);
    }
}
