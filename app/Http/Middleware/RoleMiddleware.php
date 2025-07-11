<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @param  mixed ...$roles
 * @return \Symfony\Component\HttpFoundation\Response
 */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();

        if (! $user || ! in_array($user->role, $roles)) {
            return redirect('/');
        }

        return $next($request);
    }
}
