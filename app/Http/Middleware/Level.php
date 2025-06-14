<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (Auth::check()) {
            if (in_array(Auth::user()->level, $levels)) {
                return $next($request);
            }
    
        if (Auth::user()->level === 'admin') {
            return redirect('/admin');
        }
            return $next($request);
        }
        return $next($request);
    }
}
