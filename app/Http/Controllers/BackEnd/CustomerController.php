<?php

namespace App\Http\Controllers\BackEnd;

use App\CustomerPackages;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Customer,\App\PaymentsHistory;
class CustomerController extends Controller
{
    //
	
	
	public function index(){
		$stats = [];
		$empty_error_text = "لا يوجد مستخدمين بالموقع حاليا";
		$search_text = "";
		$customers = Customer::orderBy("id","desc")->paginate(30);
	
		if(isset($_GET['search_keyword'])){
			$key = $_GET['search_keyword'];
			$empty_error_text = "لا توجد نتائج مطابقة لعملية البحث ";
			$search_text = $key;
			$customers = Customer::where('first_name', 'like', '%' .  $key .'%')->orWhere('middel_name', 'like', '%' .  $key .'%')->orWhere('first_name', 'like', '%' .  $key .'%')->orWhere('last_name', 'like', '%' .  $key .'%')->orWhere('email', 'like', '%' .  $key .'%')->orWhere('phone', 'like', '%' .  $key .'%')->paginate(30);
		}
		
		$stats['cus_count'] = Customer::count();

		$stats['pending_count'] = Customer::where("activity","pending")->count();




		return view("BackEnd.Dashboard.Customers.index",compact("customers","stats","search_text","empty_error_text"));
	}
	
	
	public function edit($customer_id,Request $request){
		$pop = [
			"editcomplete" => false
			
		];



		if(!is_numeric($customer_id)){
			return redirect("/adminpanel/customers");
		}



        $packages = Package::where("status","=",1)->get()->toArray();
		
		$customer = Customer::where("id","=",$customer_id)->first();
		
		
		
		if($request->method()=="POST"){
            $request->validate([
                'first_name' => 'required|min:3',
                'middel_name' => 'required|min:3',
				'last_name' => 'required|min:3',
				'country' => 'required|min:3',
				'gender' => 'required',
				'package' => 'required',
				'balance' => 'required',
				'status' => 'required',
				'phone' => 'required|min:8|max:15'
            ]);
				
				
				$ucustomer = Customer::where("id","=",$customer_id)->update([
					"first_name"=> $request->input("first_name"),
					"middel_name"=> $request->input("middel_name"),
					"last_name"=> $request->input("last_name"),
					"gender"=> $request->input("gender"),
					"country"=> $request->input("country"),
					"balance"=> $request->input("balance"),
					"activity"=> $request->input("status")
					
				]);
				//"package_id"=> $request->input("package"),
					
				$pop['editcomplete'] = true;
				
				$customer = Customer::where("id","=",$customer_id)->first();
		}
		
		return view("BackEnd.Dashboard.Customers.edit",compact("customer","pop","packages"));
	}



	public function view($customer_id,Request $request){
		if(!is_numeric($customer_id)){
			return redirect("/adminpanel/customers");
		}
		
		$customer = Customer::where("id","=",$customer_id)->first();
		
	
		return view("BackEnd.Dashboard.Customers.view",compact("customer"));
	}
	
	public function delete($customer_id){
		$customer = Customer::where("id","=",$customer_id)->delete();
		return back();
		
	}
	
	
	
	public function payments($customer_id){
		if(!is_numeric($customer_id)){
			return back();
		}
		
		$customer = Customer::where("id","=",$customer_id)->first();
		$payments = PaymentsHistory::where('customer_id',$customer_id)->orderBy("id","desc")->paginate(20);
		return view("BackEnd.Dashboard.Customers.payments",compact("customer","payments"));
	}


	public function packages($customer_id){
		if(!is_numeric($customer_id)){
			return back();
		}

		$customer = Customer::where("id","=",$customer_id)->first();
		$packages = CustomerPackages::where([['status','active'],['customer_id',$customer_id]])->paginate(20);
		return view("BackEnd.Dashboard.Customers.packages",compact("customer","packages"));
	}
	
}
