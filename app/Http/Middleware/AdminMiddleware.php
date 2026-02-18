<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {



        if (!Auth::check()) {
            return redirect()->route('Login')->with('error', 'Please login first.');
        }

        if (Auth::user()->role->name !== 'admin') {
            abort(403, 'Unauthorized access.');
        }
        $user = Auth::user();
        $routeName = $request->route()?->getName();
        if ($routeName && !$user->role->hasPermission($routeName)) {

            abort(403, 'You do not have permission for this action.');
        }
        return $next($request);
    }
}
