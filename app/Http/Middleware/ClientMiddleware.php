<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role->name === 'client') {
            $routeName = $request->route()->getName();
            if(Auth::user()->role->hasPermission($routeName))
                return $next($request);
        }
        return redirect()->route('Login')
            ->with('error', 'You do not have user access.');
    }
}
