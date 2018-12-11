<?php

namespace App\Http\Controllers\FrontEnd;

use App\PaymentsHistory;
use App\Profit;
use App\WalletInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\UserRegisteration;
use \App\Package,\App\Customer,\App\CustomerPackages,\App\Advertiser;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    //
	
	public function index(){
		

        $advertisment = [];
        $advertisments = Advertiser::where([["status","active",["status",1]]])->get()->toArray();
        //return $customer;


        foreach ($advertisments as $advertismen){
            $Date1 =  $advertismen['created_at'];

            // $Date1 = $advertismen['expire_after'];
            $Date2 = date('Y-m-d H:i:s', strtotime($Date1 . " + ".$advertismen['expire_after']." day"));

            $now_at = strtotime(now());
            $expire_at = strtotime($Date2);
            if($now_at<=$expire_at){
                $advertisment[] = $advertismen;
            }
        }

        $customers =Customer::count();
        $profis_count = Profit::sum("profit");
        $payments_added = PaymentsHistory::where("payment_type","pay")->sum("payment_value");
        $payments_sended = PaymentsHistory::where("payment_type","send")->sum("payment_value");


		$packages = Package::where("status","active")->get()->toArray();

        $profits = Profit::orderBy("id","desc")->limit(6)->get()->toArray();
		
		
		
		return view("FrontEnd.Home.index",compact("packages","profits","customers","profis_count"
            ,"payments_added","payments_sended","advertisment"));
	}
	
	
	public function register(Request $request)
	{
		
		$errors = [];
		$packages = Package::where("status","active")->get()->toArray();
		//
		if($request->method() == 'POST'){
			
            $request->validate([
                'first_name' => 'required|min:3',
                'middel_name' => 'required|min:3',
				'last_name' => 'required|min:3',
				'country' => 'required',
				'gender' => 'required',
				'password' => 'required|min:8|max:200',
				'email' => 'required|min:8|max:200',
				'confirm_password' => 'required|min:8|max:200',
				'phone_number' => 'required|min:8|max:15',
				'package' => 'required',
				'quantity' => 'required|min:1'
            ]);


				if(!filter_var($request->input("email"), FILTER_VALIDATE_EMAIL)){
					$email_error= 'this email is already used';
					return redirect("/register")->withErrors(["email"=>$email_error]);
				}


				$cu = Customer::where("email",$request->input("email"))->count();
				if($cu>=1){
					$email_error= 'this email is already used';
					return redirect("/register")->withErrors(["email"=>$email_error]);
					//return redirect("/register")->withErrors($email_error);
				}



				if($request->input("password")!= $request->input("confirm_password"))
				{
					$password_error = 'password doesn\' match confirm password';
					return redirect("/register")->withErrors(["password"=>$password_error]);
					//return redirect("/register")->withErrors('password doesn\' match confirm password');
				}


				if($request->input("password")== $request->input("confirm_password")){

				}else{
					$password_error = 'password doesn\' match confirm password';
					return redirect("/register")->withErrors(["password"=>$password_error]);
				// 	return redirect("/register")->withErrors('password doesn\' match confirm password');
				}







				$password = password_hash($request->input("password"),PASSWORD_DEFAULT);

								//
				$customer_object = new Customer;
				$customer_object->next_package = $request->input("package");
				$customer_object->first_name = $request->input("first_name");
				$customer_object->middel_name = $request->input("middel_name");
				$customer_object->last_name = $request->input("last_name");
				$customer_object->email = $request->input("email");
				$customer_object->password = $password;
				$customer_object->phone = $request->input("phone_number");
				$customer_object->country = $request->input("country");
				$customer_object->gender = $request->input("gender");
                $customer_object->customerid = uniqid();
				$customer_object->status = 3;
				$customer_object->activity = "waitforpayment";
				$customer_object->save();


				$customer_id_inserted = $customer_object->id;

				$cus_package_obj = new CustomerPackages;
				$cus_package_obj->customer_id = $customer_id_inserted;
				$cus_package_obj->quantity = $request->input("quantity");
				$cus_package_obj->package_id = $request->input("package");
				$cus_package_obj->save();
                $request->session()->put('customer_package', $request->input("package"));
                $request->session()->put('customer_logged', true);
                $request->session()->put('customer_id', $customer_id_inserted);
                $request->session()->put('customer_step', "checkout");


                Customer::where("id",$customer_id_inserted)->update([
                   "last_package_hsitory"=> $cus_package_obj->id
                ]);




//                if($request->session()->has("callerid")){
//                    $callerid = $request->session()->has("callerid");
//                    $customer_caller = Customer::where("customerid",$callerid)->first();
//                    $newBalance = $customer_caller->balance + 0.02;
//                    Customer::where('id',$customer_caller->id)
//                    ->update(['balance' => $newBalance]);
//                    $request->session()->forget('callerid');
//                }


				return redirect("/checkout");
		}
		
		
		return view("FrontEnd.Home.register",compact("packages"));
	}



	public function login(Request $request){

        if($request->method() == 'POST') {

            $request->validate([
                'email' => 'required|min:5',
                'password' => 'required|min:8'
            ]);

            $email = $request->input("email");
            $password = $request->input("password");


            $customer = Customer::where("email",$email)->orderBy("id","desc")->first();

            if(empty($customer)){

            }else{

                if(password_verify($password,$customer->password)){

                    if($customer->activity=="waitforpayment"){
                        // $pack = CustomerPackages::where("customer_id",$customer->id)->orderBy("id","desc")->first();
                        // $request->session()->put('customer_package', $pack->id);
                        $request->session()->put('customer_logged', true);
                        $request->session()->put('customer_id', $customer->id);
                        $request->session()->put('customer_step', "checkout");
                        return redirect("/checkout");
                    }else{
                        $request->session()->put('customer_package', $customer->package_id);
                        $request->session()->put('customer_logged', true);
                        $request->session()->put('customer_id', $customer->id);
                        $request->session()->put('customer_step', "panel");
                        return redirect("/mypanel");
                        

                        
                    }

                }

            }

        }

		return view("FrontEnd.Auth.login"); 
	}
	
	public function logout(Request $request){
        $request->session()->flush();
		return redirect("/"); 
	}


	public  function profile(Request $request){
	    $customer_id = $request->session()->get("customer_id");
	    $customer = Customer::find($customer_id);

	    return view("FrontEnd.Panel.profile",compact("customer"));
    }

    public  function balance(Request $request){
	    $customer_id = $request->session()->get("customer_id");
	    $customer = Customer::find($customer_id);

	    return view("FrontEnd.Panel.balance",compact("customer"));
    }


    public  function walletinfo(Request $request){
	    $customer_id = $request->session()->get("customer_id");

	    $isUpadted = false;


	    if($request->method()=="POST"){

	        $request->validate([

                "provider"=>"required",
                "other"=>"required",
                "phone"=>"required",
                "account"=>"required"
            ]);

            $walletinfo = WalletInfo::where("customer_id",$customer_id)->first();
	        if($request->input("provider")!="0"){



                if(empty($walletinfo)){

                    $wallet = new WalletInfo();
                    $wallet->customer_id = $customer_id;
                    $wallet->gateway = $request->input("provider");
                    $wallet->phone = $request->input("phone");
                    $wallet->account = $request->input("account");
                    $wallet->other = $request->input("other");
                    $wallet->save();
                    $isUpadted = true;

                }else{


                    WalletInfo::where("customer_id",$customer_id)->update(
                        [
                            "gateway"=>$request->input("provider"),
                            "phone"=>$request->input("phone"),
                            "account"=>$request->input("account"),
                            "other"=>$request->input("other")
                        ]
                    );

                    $isUpadted = true;
//                    $walletinfo = WalletInfo::where("customer_id",$customer_id)->first();


                }
            }

        }
        $walletinfo = WalletInfo::where("customer_id",$customer_id)->first();

	    //return $walletinfo;

	    return view("FrontEnd.Panel.walletinfo",compact("walletinfo","isUpadted"));
    }




    public function  sendmail(Request $request){

        $link = url("public/json/contact.json");
        $upport = json_decode(file_get_contents($link),true);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'phone' => 'required|min:3',
            'message' => 'required'
        ]);

       // Mail::to($upport["support"]);

        return back();

    }



    public  function  privacy(){
	    return view("FrontEnd.Content.privacy");
    }


    public  function  about(){
	    return view("FrontEnd.Content.about");
    }




}
