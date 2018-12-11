<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class UserLogged
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

        if(Session::exists('customer_logged') && Session::get('customer_logged') == true && Session::exists('customer_id')){

            return redirect("/mypanel");
        }


        return $next($request);
    }
}
