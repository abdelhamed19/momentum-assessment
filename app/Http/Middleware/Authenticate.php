<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (str_contains($request->url(), 'api')) {
            $request->headers->set('Accept', 'application/json');
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
        return response()->json([
            'message' => 'Unauthenticated'
        ], 401);
    }
}
