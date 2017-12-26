<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        
        if($request->header()["authorization"][0] !== md5(env('APP_KEY') . env('APP_USER-AGENT') . env("APP_SALT"))) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
