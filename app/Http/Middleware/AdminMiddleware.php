<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($this->isAdmin($request)){
            return $next($request);
        }

        abort(403);
    }

    protected function isAdmin(Request $request): bool
    {
        return false;
    }
}
