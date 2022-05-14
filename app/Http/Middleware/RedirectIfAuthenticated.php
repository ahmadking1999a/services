<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */

    public function handle($request, Closure $next, ...$guards)//$guard = null
    {

        $guards = empty($guards) ? [null] : $guards;

        foreach($guards as $guard){
            if(Auth::guard($guard)->check()){
                if($guard ==="admin")
                {
                    return redirect()->route('admin.index');
                }
                return redirect()->route('admin.login');
            }
        }
        // if ($guard == "admin" && Auth::guard($guard)->check()) {
        //     return redirect('/admin');
        // }
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        return $next($request);
    }

}
