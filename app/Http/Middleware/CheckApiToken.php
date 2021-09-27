<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->input('token');

        if ($token && $token === env('API_TOKEN')) {
            return $next($request);
        }

        return response()->json('Unauthorized', 401);
    }
}
