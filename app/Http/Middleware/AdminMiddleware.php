<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin; // Updated import path

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (App\Http\Controllers\Admin\Admin::checkRole($request)) {
            return $next($request);
        }
    
        abort(403, 'Unauthorized');
    }
}