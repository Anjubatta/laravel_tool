<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect('/dashboard');
            $user = Auth::user();

            if($user->roles->name=='SuperAdmin'){
                return redirect()->route('superadmin.dashboard.index') ;
            }
            elseif($user->roles->name=='Admin'){
                return redirect()->route('admin.dashboard.index') ;
            }
            elseif($user->roles->name=='Teachers'){
                return redirect()->route('teacher.dashboard.index') ;
            }
        }

        return $next($request);
    }
}
