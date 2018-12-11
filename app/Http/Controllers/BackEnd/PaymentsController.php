<?php

namespace App\Http\Controllers\BackEnd;

use App\blockchain;
use App\Customer;
use App\CustomerPackages;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\PaymentsHistory;
use PayPal\Api\PaymentHistory;

class PaymentsController extends Controller
{
    //
	
	public function index(){
		$payments = PaymentsHistory::where("status","!=","PaymentPending")->orderBy("id","desc")->paginate(50);
		
		return view("BackEnd.Dashboard.Payments.index",compact("payments"));
	}



	public  function  payment($payment_id,Request $request){

	    $isEdited = false;
	    $payment = PaymentsHistory::find($payment_id);
        if(empty($payment)){
            return back();
        }
	    $customer = Customer::find($payment->customer_id);
        if(empty($customer)){
           return back();
        }

        $package = Package::find($payment->package_id);

//return $payment;
        if(empty($package)){
            return back();
        }
        
        
        
        
        
        
        
        

        if($request->method()=="POST"){
            $request->validate([
                'status' => 'required'
            ]);
            $status = $request->input("status");
            $payment_gateway = $payment->gateway;
            $ob_type = $payment->payment_type;

            if($payment_gateway == "Mbok"  && $ob_type == "pay"){


                if($status=="completed"){
                    Customer::where("id",$customer->id)->update([
                            "activity" => "complete"
                        ]
                    );



                    $old = CustomerPackages::where([["package_id",$package->id],["customer_id",$customer->id],[
                        "status","pending"
                    ]])->orderBy("id","desc")->first();


                    if(!empty($old)){
                        if($old->activited_at==null){
                            CustomerPackages::where([["package_id",$package->id],["customer_id",$customer->id],[
                                "status","pending"
                            ]])->orderBy("id","desc")->update([

                                "activited_at" => now(),
                                "status" => "active"
                            ]);

                        }
                    }

                    // back to it

                    Customer::where("id",$customer->id)->update([
                            "activity" => "complete",
                            "next_package"=>0
                        ]
                    );


                    $isEdited =true;
                }

            }elseif($payment_gateway == "BlockChain"  && $ob_type == "pay"){
                


                if($status=="completed"){




                    $old = CustomerPackages::where([["package_id",$package->id],["customer_id",$customer->id],[
                        "status","pending"
                    ]])->orderBy("id","desc")->first();


                    if(!empty($old)){
                        if($old->activited_at==null){
                            CustomerPackages::where([["package_id",$package->id],["customer_id",$customer->id],[
                                "status","pending"
                            ]])->orderBy("id","desc")->update([

                                "activited_at" => now(),
                                "status" => "active"
                            ]);

                        }
                    }

                    Customer::where("id",$customer->id)->update([
                            "activity" => "complete",
                            "next_package"=>0
                        ]
                    );
                    blockchain::where("payment_id",$payment_id)->update([
                        "status" =>"complete"
                    ]);



                    $isEdited =true;
                }

            }





            PaymentsHistory::where("id",$payment_id)->update([
                "status" => $status
            ]);


        }


	    return view("BackEnd.Dashboard.Payments.payment",compact("payment","customer","isEdited"));
    }


    public function create_payment(Request $request){


	    //return Date("Y-m-d H:i:s");
	    $customers = Customer::all();
	    $packages = Package::all();

	    if($request->method()=="POST"){

	        $request->validate([
	            "package"=>"required",
	            "customer"=>"required",
	            "gateway"=>"required",
	            "value"=>"required|min:1",
	            "status"=>"required",
	            "quantity"=>"required|min:1"
            ]);


            if($request->input("status")=="active"){

                $history = CustomerPackages::where([['customer_id',$request->input("customer")],
                    ['package_id',$request->input("package")],
                    ['status',"active"]
                ])->first();


                if(!empty($history)){
                    return back()->withErrors(["error"=>"المستخدم مشترك في هذه الباقة لا يمكن الاشتراك في نفس الباقة مرتين في نفس الوقت"]);
                }



                $packagess = new CustomerPackages();
                $packagess->customer_id = $request->input("customer");
                $packagess->package_id = $request->input("package");
                $packagess->status = "active";
                $packagess->quantity = $request->input("quantity");
                $packagess->activited_at = Date("Y-m-d H:i:s");
                $packagess->save();



            }


            $customer =  Customer::find($request->input("customer"));
	        $payment = new \App\PaymentsHistory();
            $payment->customer_id  = $request->input("customer");
            $payment->package_id  = $request->input("package");
            $payment->payment_value  = $request->input("value");
            $payment->total  = $request->input("value") * $request->input("quantity");
            $payment->gateway  = $request->input("gateway");
            $payment->refrance  = uniqid();
            $payment->account  = $customer->email;
            $payment->payment_type  = "Pay";
            $payment->status  = "completed";
            $payment->save();








            return redirect("adminpanel/payments");
        }

	    return view("BackEnd.Dashboard.Payments.create_payment",compact("payment","packages","customers"));
    }

	
}
