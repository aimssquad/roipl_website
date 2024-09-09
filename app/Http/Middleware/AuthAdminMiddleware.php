<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(Auth::check() && Auth::user()->hasAnyRole($roles)){
            return $next($request);
        }else{
            Auth::logout();
            return back()->withErrors([
                'email' => 'you don not have to access admin area contact admin !',
            ]);
        }

    }
}
