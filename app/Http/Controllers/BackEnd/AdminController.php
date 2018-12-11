<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Admin;
use Session;
class AdminController extends Controller
{

    public function index(Request $request){
        $custom_errors = [];
        if($request->method() == "POST"){

            
            $request->validate([
                'email' => 'required|max:255|regex:/^.+@.+$/i',
                'password' => 'required',
            ]);


            $email = $request->input("email");
            $password = $request->input("password");

            

            $admin = Admin::where("email","=",$email)->first();
            if(!empty($admin)){

                $cpassword = $admin->password;
                if(password_verify($password,$cpassword)){
                    Session::put('adminSession', 'logged');
                   return  redirect("adminpanel/dashboard");
                }else{
                    $custom_errors[] = "البيانات المدخلة غير صحيحة"; 
                }
            }else{
               
                $custom_errors[] = "البيانات المدخلة غير صحيحة";
                
            }
        }


        return view("BackEnd.login",compact("custom_errors"));
    }
	
	
	
	public function logout(Request $request)
	{
		$request->session()->forget('adminSession');

		return redirect("adminpanel");
		
	}
}
