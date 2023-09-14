<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('web:customer')->check() && Route::currentRouteName() != 'login') {
            return redirect('login');
        }
 
        return $next($request);
    }
}
