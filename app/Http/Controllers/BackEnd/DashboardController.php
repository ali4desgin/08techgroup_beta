<?php

namespace App\Http\Controllers\BackEnd;

use App\Customer;
use App\DateHelper;
use App\PaymentsHistory;
use App\Profit;
use App\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Notifications;

class DashboardController extends Controller
{
    //

    public function index(){

        $data = [];
        $data["count"]["customers"] = Customer::count();
        $data["count"]["new_tickets"] = Tickets::where("status","new")->count();
        $data["count"]["waiting_customers"] = Customer::where("activity","pending")->count();
        $data["sum"]["deposits"] = PaymentsHistory::where([["payment_type","pay"],["status","completed"]])->sum("payment_value");
        $data["sum"]["withdump"] = PaymentsHistory::where([["payment_type","send"],["status","completed"]])->sum("payment_value");
        $data["sum"]["profits"] = Profit::sum("profit");
        $data["sum"]["today_profits"] = Profit::where("daily_date",DateHelper::returnToday())->sum("profit");




        $payments = PaymentsHistory::orderBy("id","desc")->limit(10)->get();


        return view("BackEnd.Dashboard.index",compact("data","payments"));
    }









	
	public function payments_gateways(Request $request){
		
		
		
		
		if($request->method()=="POST"){

			$data = $request->input();
			$master = false;
			$paypal = false;
			$blockchain = false;
			$mbok = false;
			
			
			if(isset($data['Master'])){
				$master = true;
			}
			if(isset($data['PayPal'])){
				$paypal = true;
			}
			if(isset($data['BlockChain'])){
				$blockchain = true;
			}
			if(isset($data['Mbok'])){
				$mbok = true;
			}
			
			
			
			
			$edit_gateway["Mbok"] = $mbok;
			$edit_gateway["PayPal"] = $paypal;
			$edit_gateway["BlockChain"] = $blockchain;
			$edit_gateway["Master"] = $master;
			
			
			$newJsonString = json_encode($edit_gateway);
		
			file_put_contents("public/json/payments_mthods.json",$newJsonString);
			
			
			
			
			
			
		}
		

		
		
		$payment_methods_string = file_get_contents("public/json/payments_mthods.json");
		$gateway = json_decode($payment_methods_string,true);

		return view("BackEnd.Dashboard.Paymentsgateways.index",compact("gateway"));
	}
	
	
	public function gateway($payment_id,Request $request){
		
		// post request in page
	
		
		
		
		// load data
		switch($payment_id){
			
			case 1:
				 $url = file_get_contents("public/json/gateways/paypal.json");
			break;
			
			
			default:
			return back();
			
		}
		
		
		
		
		
		
		
		$data = json_decode($url,true);
		$gateway = $data["production"];
		
		
		
		
		return view("BackEnd.Dashboard.Paymentsgateways.payment",compact("data","payment_id","gateway"));
	}
	
	
	
	public function notifiactions(){
		
		
		$nofitications = Notifications::orderBy('id',"desc")->paginate(50);
		
		
		return view("BackEnd.Dashboard.Notifications.index",compact("nofitications"));
	}
	
	
	public function read_notify($notification_id,Request $request){
		
		Notifications::where("id",$notification_id)->update([
			"viewed" => 1
			
		]);
		
		return back();
	}
}
