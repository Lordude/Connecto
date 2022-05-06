<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);

            if(session('TypeRole') == '2')
            {
                return $next($request);
            }
            else{
                return redirect(route('admin.services.index'))->with('NotSuper','Accès refusé! ');
                // ->with('AccessAdminDenided','Accès refusé');
            }
    }
}
