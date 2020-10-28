<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $roles
     *
     * @return mixed
     */
    public function handle($request, Closure $next, string $roles)
    {
        $allowedRoles = explode(',', $roles);
        /** @var User */
        $user = $request->user();
        if ($user->hasAnyRole($allowedRoles)) {
            return $next($request);
        }
        $message = 'This action is unauthorized.';

        return $request->expectsJson()
            ? response()->json(['message' => $message], 401)
            : redirect('account');
    }
}
