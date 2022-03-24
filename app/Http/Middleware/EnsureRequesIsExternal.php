<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\HttpResponseException as HttpResponseException;

class EnsureRequesIsExternal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->token == env("INTERNALTOKEN")) {
            return $next($request);
        } else {
            throw new HttpResponseException(response()->json(['error' => 'Unauthorized'], 401));
        }
    }
}
