<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            if ($request->route()->getName() == 'admin.login' || $request->route()->getName() == 'admin.postLogin') {
              return redirect()->route('main');
            }
            return $next($request);
        }elseif ($request->route()->getName() == 'admin.login' || $request->route()->getName() == 'admin.postLogin') {
            return $next($request);
        }
        return redirect()->route('admin.login');
    }
}
