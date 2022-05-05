<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSession
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

        if(session()->has('emailUser'))
        {

            // if(session('TypeRole') == '2')
            // {
            //     return $next($request);
            // }
            // else{
            //     return redirect(route('home'))->with('AccessAdminDenided','Accès refusé');
            // }

            return $next($request);
        }
        else{
            return redirect(route('home'))->with('AccessDenided','Veuillez-vous connecter pour accéder à cette page! 😊');
        }
    }
}
