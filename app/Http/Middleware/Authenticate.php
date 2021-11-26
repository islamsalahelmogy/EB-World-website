<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if ($request->is('admin') || $request->is('admin/*')) {
            if(Auth::guard('admin')->check())
                return $next($request);
            return redirect('/');
        }
        if ($request->is('user') || $request->is('user/*')) {
            if(Auth::guard('user')->check())
                return $next($request);
            return redirect('/');        
        }
        return $next($request);
    }
}
