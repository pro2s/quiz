<?php

namespace App\Http\Middleware;

use Closure;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $allowedRoles = explode(',', $roles);
        if ($request->user()->hasAnyRole($allowedRoles)) {
            return $next($request);
        }
        $message = 'This action is unauthorized.';

        return $request->expectsJson()
            ? response()->json(['message' => $message], 401)
            : redirect('account');
    }
}
