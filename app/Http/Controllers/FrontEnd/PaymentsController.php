<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Maxtee\Blockchain\Facades\Blockchain;
use \App\Customer,\App\Package,\App\Advertiser,\App\Profit,\App\DateHelper,\App\CustomerWeekProfit,\App\PaymentsHistory;
use \App\CustomerPackages;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\AdaptivePayments;
use Srmklive\PayPal\Facades\PayPal;
class PaymentsController extends Controller
{
    //



    public function index(){

        //Session::flush();

        return view("FrontEnd.Payments.Checkout.index");
    }



    public function  redirect(Request $request){


        if($request->input("payment") == "paypal"){
            $paypal_json = json_decode(file_get_contents(url("public/json/gateways/PayPal.json")),true);
            $paypal = $paypal_json['development'];

            //$package =  $this->getUserPendingPackage(Session::get('customer_id'));





            $customer = Customer::find(Session::get('customer_id'));
            $package = Package::find($customer->next_package);
            $cpackage = CustomerPackages::find($customer->last_package_hsitory);
            return $cpackage;
            $price =  $cpackage->quantity * $package->price;
            //$count =  $cpackage->quantity;



            $payment_h = new PaymentsHistory;
            $payment_h->customer_id = $request->session()->get("customer_id");
            $payment_h->payment_value = $price;
            $payment_h->payment_type = "pay";
            $payment_h->package_id = $package->id;
            $payment_h->gateway = "PayPal";
            $payment_h->status = "PaymentPending";
            $payment_h->save();

            $invoce_id = $payment_h->id;
            $str = "
            <style>div {
                text-align: center;
                margin: 200px;
            }</style>
            <form action=\"".$paypal['paypal_url']."\" id=\"paypal_form\" method=\"POST\"><input type=\"hidden\" name=\"cmd\" value=\"_xclick\"><input type=\"hidden\" name=\"business\" value=\"".$paypal['email']."\"><INPUT type=\"hidden\" name=\"charset\" value=\"utf-8\"><input type=\"hidden\"name=\"item_name\" value=\"Make Payment\"><input type=\"hidden\" name=\"item_number\" value=\"".$package->id."\"><input type=\"hidden\" name=\"amount\" value=\"".$package->price."\"><input type=\"hidden\" name=\"notify_url\" value=\"".$paypal['notify_url']."\" ><input type=\"hidden\" name=\"return\" value=\"".$paypal['return_url']."\"><input type=\"hidden\" name=\"cancel_return\" value=\"".$paypal['cancel_url']."\"><input type=\"hidden\" name=\"custom\" value=\"".$invoce_id."\">
            <div class=\"loading_image\">
            <img src=\"".url("public/frontend/custom/loading.gif")."\" class=\"\">
            <h1>Redirecting to PayPal <button type=\"submit\">click here</button></h1>
            </div>
            </form>
            <script>var form = document.getElementById(\"paypal_form\"); form.submit();</script>
            ";
            return $str;

        }else if($request->input("payment") == "mbok"){



            return redirect("checkout/mbok");


        }else if($request->input("payment") == "blockchain"){



            return redirect("checkout/blockchain");

        }


       // return $request->input();

    }


    public function payments_history(Request $request){

        $customer_id = $request->session()->get("customer_id");
        $payments_history = PaymentsHistory::where([
            ["customer_id",$customer_id],

            ["status","!=","PaymentPending"]
        ])->orderBy("id","desc")->paginate(15);


        return view("FrontEnd.Panel.payment_hsitory",compact("payments_history"));
    }





    public function paypal_notify(Request $request){

        if($request->method()=="POST"){

            $item_name = $request->input('item_name');
            $item_number = $request->input('item_number');
            $payment_status = $request->input('payment_status');
            $payment_amount = $request->input('mc_gross');
            $payment_currency = $request->input('mc_currency');
            $txn_id = $request->input('txn_id');
            $receiver_email = $request->input('receiver_email');
            $payer_email = $request->input('payer_email');
            $inovice_id = $request->input('custom');




            $payment_history = PaymentsHistory::find($inovice_id);

            $customer_id = $payment_history->customer_id;



            $package_history = CustomerPackages::where('customer_id', $customer_id)->orderBy("id","desc")->first();

            $package = Package::find($package_history->package_id);

            if(!empty($package)){

                if($package->price == $payment_amount){

                    $customer = Customer::where("id",$customer_id)->update([
                        "package_id" => $package->id,
                        "status"=>2,
                        "package_actived_date"=>now()
                    ]);

                    CustomerPackages::where("id",$package_history->id)->update([
                        "status" => "active"
                    ]);

                    PaymentsHistory::where("id",$inovice_id)->update([
                        "status" => "completed",
                        "account"=>$payer_email,
                        "refrance"=>$txn_id
                    ]);





                }

            }else{

                echo "error : 101";
            }



        }

    }




    public function success_paypal(Request $request){

        $request->session()->put('customer_step', "success");
    }






    public  function mbok(){

        $mbok_json = json_decode(file_get_contents(url("public/json/gateways/mbok.json")),true);
        $mbok = $mbok_json['development'];

//        $customer = Customer::find(Session::get('customer_id'));
//        $package = Package::find($customer->next_package);
//        $payment_h = new PaymentsHistory;
//        $payment_h->customer_id = $request->session()->get("customer_id");
//        $payment_h->payment_value = $package->price;
//        $payment_h->payment_type = "pay";
//        $payment_h->package_id = $package->id;
//        $payment_h->gateway = "PayPal";
//        $payment_h->status = "PaymentPending";
//        $payment_h->save();

        $customer = Customer::find(Session::get('customer_id'));
        
       // return $customer;
        $cpackage = CustomerPackages::find($customer->last_package_hsitory);
$package = Package::find($cpackage->package_id);
// return $cpackage;
        $price = $mbok['SDG'] * $cpackage->quantity * $package->price;
        $count =  $cpackage->quantity;
        return view("FrontEnd.Payments.Checkout.mbok",compact("price","package","count"));
    }





    public function  mbok_confirm(Request $request){

        if($request->method()=="POST") {


            $customer_id = $request->session()->get("customer_id");

            $request->validate([
                'paymentid' => 'required|min:3',
                'account_number' => 'required|min:3'
            ]);


            $mbok_json = json_decode(file_get_contents(url("public/json/gateways/mbok.json")),true);
            $mbok = $mbok_json['development'];


            $customer = Customer::find(Session::get('customer_id'));
            
            $cpackage = CustomerPackages::find($customer->last_package_hsitory);
$package = Package::find($cpackage->package_id);
            $total = $cpackage->quantity * $package->price;
            $payment_h = new PaymentsHistory;
            $payment_h->customer_id = $customer_id;
            $payment_h->payment_value = $total;
            $payment_h->package_id = $package->id;
            //$payment_h->total = $total;
            $payment_h->payment_type = "pay";
            $payment_h->gateway = "Mbok";
            $payment_h->account = $request->input("account_number");
            $payment_h->refrance = $request->input("paymentid");
            $payment_h->status = "pending";

            $payment_h->save();




//            $invoce_id = $payment_h->id;



            Customer::where("id",$customer_id)->update([
               "activity" => "pending",
                "pendingGatway"=>"mbok"
            ]);



            return redirect("checkout/mbok/confirm");

        }





        return view("FrontEnd.Payments.Checkout.mbok_confirm");;


    }




    public function getUserPendingPackage($customer_id)
    {

//        $package_id = CustomerPackages::where([
//            ["customer_id",$customer_id]
//        ])->orderBy("id","desc")->select("package_id")->first();

//        $package = Package::find($package_id->package_id);
//        if(empty($package)){
//           return null;
//        }
//

//        return $package;
    }



    public function  sendprofit(){
         return view("FrontEnd.Payments.Profit.send");
    }













    /*
     * blocchain ob here
     *
     * */
    public function blockchain(Request $request2){


        $customer_id = $request2->session()->get("customer_id");
//        $package =  $this->getUserPendingPackage(Session::get('customer_id'));
//
//        $cpackage = CustomerPackages::find($customer->last_package_hsitory);
//        $price =  $cpackage->quantity * $package->price;


        $customer = Customer::find(Session::get('customer_id'));
        $package = Package::find($customer->next_package);
        $cpackage = CustomerPackages::find($customer->last_package_hsitory);
        $price =  $cpackage->quantity * $package->price;


        $old_address = \App\blockchain::where([["customer_id",$customer_id],["package_id",$package->id],["status","pending"]])->orderBy("id","desc")->first();


        if(empty($old_address)){

            $api_key = env("BLOCKCHAIN_API_KEY");
            $xpub = env("BLOCKCHAIN_UPUB_KEY");
            $secret = env("BLOCKCHAIN_SECRIT");





            $payment_h = new PaymentsHistory;
            $payment_h->customer_id = $customer_id;
            $payment_h->package_id = $package->id;
            $payment_h->payment_value = $price;
            $payment_h->payment_type = "pay";
            $payment_h->gateway = "BlockChain";
            $payment_h->status = "PaymentPending";
            $payment_h->save();

            $payment_id = $payment_h->id;


            $callbackURL = url("/blockchain/callback?payment=".$payment_id."&secret=".$secret);




            $receive_url = "https://api.blockchain.info/v2/receive?key=".$api_key."&xpub=".$xpub."&callback=".urlencode($callbackURL)."&gap_limit=10000";

            $request = curl_init();
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($request, CURLOPT_URL, $receive_url);
            $response = curl_exec($request);

            $response = json_decode($response, true);


//return $response;
            $paymentAddress = $response['address'];











            $btc_value =  file_get_contents("https://www.blockchain.com/tobtc?currency=usd&value=" .$price);





            $oaddress = new \App\blockchain();
            $oaddress->customer_id = $customer_id;
            $oaddress->address = $paymentAddress;
            $oaddress->value = $btc_value;
            $oaddress->package_id = $package->id;
            $oaddress->payment_id = $payment_id;
            $oaddress->status = "pending";
            $oaddress->save();


        }else{



            $paymentAddress = $old_address->address;
            $btc_value = $old_address->value;


        }






        return view("FrontEnd.Payments.Checkout.blockchain",compact("paymentAddress","btc_value"));


    }



    public function blockchainconfirm(Request $request){


        $customer_id = $request->session()->get("customer_id");
        $package =  $this->getUserPendingPackage(Session::get('customer_id'));


//        $package =  $this->getUserPendingPackage(Session::get('customer_id'));
//
//        $cpackage = CustomerPackages::find($customer->last_package_hsitory);
//        $price =  $cpackage->quantity * $package->price;


        $customer = Customer::find($customer_id);
        $package = Package::find($customer->next_package);
        
        if($request->method()=="POST"){


            $request->validate([
                "transactionhash" => "required"
            ]);


            $old_address = \App\blockchain::where([["customer_id",$customer_id],["package_id",$package->id],["status","pending"]])->orderBy("id","desc")->first();
            //return $old_address;
            
           // return $request->input("transactionhash");
             PaymentsHistory::where("id",$old_address->payment_id)->update(
                [
                    "status" => "pending",
                    "account" => $request->input("transactionhash")
                ]
            );


            Customer::where("id",$customer_id)->update([
                "activity"=>"pending",
                "pendingGatway"=>"blockchain"
            ]);




        }

        return view("FrontEnd.Payments.pending");

    }
}


