<?php

namespace App\Http\Middleware;

use App\Customer;
use Closure;

class CheckOutNotComplete
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

        // $id = $request->session()->get("customer_id");
        // $customer = Customer::find($id);

        // if($customer->activity=="complete"){

        //     return redirect("mypanel");
        // }




        //     return redirect("mypanel");

        return $next($request);
    }
}
