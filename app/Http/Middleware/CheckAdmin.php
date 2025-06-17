<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle($request, \Closure $next)
{
    $user = $request->user();

    if (!$user || $user->rolID !== 1 || $user->accountStatus !== 'active') {
        return response()->json(['message' => 'No autorizado'], 403);
    }

    return $next($request);
}
}
