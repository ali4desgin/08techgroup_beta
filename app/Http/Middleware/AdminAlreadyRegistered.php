<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class AdminAlreadyRegistered
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
        // if(Session::has('adminSession')) {
//             return redirect('/cpanel/dashboard');
//         }
        return $next($request);
    }
}
