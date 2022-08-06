<?php

namespace App\Http\Middleware;

use Closure;
use ValidateRequests;
use Auth;

class SuperAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        else{
            if (Auth::check() && Auth::user()->role_id == 1) {
                return $next($request);
            }
            abort(403);
        }
        
    }
}
