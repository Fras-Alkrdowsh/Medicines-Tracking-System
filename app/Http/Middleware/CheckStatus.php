<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('pharmacist')->check()) {
            if (Auth::guard('pharmacist')->user()->status !== 'enable') {
                Auth::guard('pharmacist')->logout();
                return redirect('/')->with('error', 'Your account is disabled.');
            }
        }
        

        return $next($request);
    }
}
