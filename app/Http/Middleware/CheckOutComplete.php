<?php

namespace App\Http\Middleware;

use App\Customer;
use App\PaymentsHistory;
use Closure;
use Session;
class CheckOutComplete
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


        $id = $request->session()->get("customer_id");
        $customer = Customer::find($id);

        //return $customer;
      //  if(!$customer->package_id>=1){



//            if($customer->activity=="waitforpayment"){
//                return redirect("checkout");
//            }else if($customer->activity=="pending"){
//
//                if($customer->pendingGatway=="blockchain"){
//                    return redirect("checkout/blockchain/confirm");
//
//                }else if($customer->pendingGatway=="mbok"){
//                    return redirect("checkout/mbok/confirm");
//                }
//
//            }


//            if($request->session()->has("mbok") and $request->session()->get("mbok")=="waiting") {
//                $p = PaymentsHistory::find($request->session()->get("mbok_inovce_id"));
//                if($p->status=="pending"){
//                    return redirect("mbok/confirm");
//                }
//
//            }
        //return redirect("checkout");
      //  }
        return $next($request);
    }
}
