<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolebaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $Rolebase): Response
    {
        if ( Auth::user()->role == $Rolebase) {
            return $next($request);
        }
        else{

            return redirect('/')->with('error', 'You are not admin.');
        }
        
    }
}
