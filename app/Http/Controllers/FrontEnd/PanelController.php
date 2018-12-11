<?php

namespace App\Http\Controllers\FrontEnd;

use App\CustomerPackages;
use App\PaymentsHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Customer,\App\Package,\App\Advertiser,\App\Profit,\App\DateHelper,\App\CustomerWeekProfit,\App\Tickets,\App\TicketMessages;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
class PanelController extends Controller
{


    public function index(Request $request){



        $customer_id  = $request->session()->get("customer_id");




        $customer = Customer::where("id",$customer_id)->first();



        $packages = CustomerPackages::where([["customer_id",$customer->id],['status','active']])->get()->toArray();
        $today_date = DateHelper::returnToday();

        $total_profit = 0;
        foreach ($packages as $package){

            $profit = Profit::where([
            ["package_id","=",$package['package_id']],
            ["daily_date","=",$today_date],
//            ["created_at","=",$customer->package_actived_date],
            ])->orderBy("id","desc")->first();
            if(!empty($profit)){
                $total_profit = $total_profit + $profit->profit;
            }


        }



      //  $advertisment = [];
       // $advertisments = Advertiser::where([["package_id",$package->id],["status","active"]])->get()->toArray();


//        foreach ($advertisments as $advertismen){
//            $Date1 =  $advertismen['created_at'];
//
//            $Date2 = date('Y-m-d H:i:s', strtotime($Date1 . " + ".$advertismen['expire_after']." day"));
//
//            $now_at = strtotime(now());
//            $expire_at = strtotime($Date2);
//            if($now_at<=$expire_at){
//                $advertisment[] = $advertismen;
//            }
//        }








//        $profit = Profit::where([
//            ["package_id","=",$customer->package_id],
//            ["daily_date","=",$today_date],
////            ["created_at","=",$customer->package_actived_date],
//        ])->orderBy("id","desc")->first();
//
//
//        if($profit->created_at < $customer->package_actived_date){
//            $profit = null;
//        }

//
//        $allprofit = CustomerWeekProfit::where([
//            ["customer_id",$customer->id],
//        ])->orderBy("id","desc")->get()->toArray();



        $sum_for_current_package = 0;
        $sum_for_all_packages = 0;
//
//        foreach($allprofit as $prof)
//        {
//            if($prof['status'] == "add"){
//                $sum_for_all_packages = $sum_for_all_packages + $prof['profit'];
//            }else{
//                $sum_for_all_packages = $sum_for_all_packages - $prof['profit'];
//
//            }
//
//
//            if($prof['package_id'] == $customer->package_id){
//
//                if($prof['status'] == "add"){
//                    $sum_for_current_package = $sum_for_current_package + $prof['profit'];
//                }else{
//                    $sum_for_current_package = $sum_for_current_package - $prof['profit'];
//
//                }
//            }
//
//
//        }





        $activited_date = $customer->package_actived_date;

        $today_n = date("N");

        $resgister_n = date("N",strtotime($activited_date));



        $days_later_for_making_new_request =  (7 - $today_n ) + ($resgister_n - 1);

//
//        $week_profit = CustomerWeekProfit::where([
//            ["customer_id",$customer_id],
//            ["status","add"]
//        ])->orderBy("id","desc")->first();
//
//

        return view("FrontEnd.Panel.index",
            compact("customer",
                "package","days_later_for_making_new_request",
                "profit","lastest_profit","customers_in_same_package","all_customers","week_profit","sum_for_all_packages",
                "sum_for_current_package","advertisment","packages","total_profit"));
    }






    public function  myprofit(Request $request){
        $customer_id = $request->session()->get("customer_id");

        $customer = Customer::find($customer_id);

        $proftis = DB::select("SELECT profits.* FROM profits WHERE profits.package_id in ( SELECT customer_packages.package_id FROM customer_packages WHERE customer_packages.customer_id = {$customer->id}) and profits.created_at >= (SELECT customer_packages.activited_at FROM customer_packages WHERE customer_packages.package_id = profits.package_id and customer_packages.customer_id = {$customer->id} AND customer_packages.status = \"active\"  ORDER BY customer_packages.id DESC) ORDER BY profits.id");


        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($proftis);

        // Define how many items we want to be visible in each page
        $perPage = 20;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        // set url path for generted links
        $paginatedItems->setPath($request->url());


        return view("FrontEnd.Panel.profit",compact("paginatedItems"));
    }


    public function  tickets(Request $request){
        $customer_id = $request->session()->get("customer_id");

        if($request->method()=="POST"){
            $request->validate([
                'title' => 'required|min:3',
                'message' => 'required|min:3'
            ]);

            $tickt = new Tickets();
            $tickt->title = $request->input("title");
            $tickt->customer_id = $customer_id;
            $tickt->message = $request->input("message");
            $tickt->save();
            return back();
        }

        $tickets = Tickets::where("customer_id",$customer_id)->orderBy("id","desc")->paginate(20);

        return view("FrontEnd.Panel.tickets",compact("tickets"));
    }



    public function view_ticket($ticket_id, Request $request){

        $ticket = Tickets::find($ticket_id);

        if(empty($ticket)){
            return back();
        }

        if($ticket->customer_id!=$request->session()->get("customer_id")){
            return back();
        }


        if($request->method()=="POST"){
            $request->validate([
                'message' => 'required|min:3'
            ]);

            $reply = new TicketMessages();
            $reply->ticket_id = $ticket_id;
            $reply->isAdmin = "0";
            $reply->content = $request->input("message");
            $reply->save();

            Tickets::where("id",$ticket_id)->update([
                "status"=>"userreplay"
            ]);


            return back();
            }


        $messages = TicketMessages::where("ticket_id",$ticket_id)->orderBy("id","desc")->paginate(8);
       
        return view("FrontEnd.Panel.view_ticket",compact("ticket","messages"));
    }




    public  function myplan(Request $request){
        $customer_id = $request->session()->get("customer_id");

        $customer = Customer::find($customer_id);
        $package = Package::find($customer->package_id);
        $olds = CustomerPackages::where("customer_id",$customer_id)->paginate(20);
        return view("FrontEnd.Panel.myplan",compact("package","olds","customer"));
    }




    public function advertisement(Request $request){

        $isAdded = false;
        $customer_id = $request->session()->get("customer_id");

        $customer = Customer::find($customer_id);
        $ads = Advertiser::where([
            ["package_id",$customer->package_id],
            ["status",1]
        ])->get()->toArray();

        $packages = Package::where("status",1)->get()->toArray();


        if($request->method()=="POST"){

            $request->validate([
                'ar_title' => 'required|min:3',
                'en_title' => 'required|min:3',
                'package' => 'required',
                'url' => 'required|min:3'
            ]);


            $pack = Package::find($request->input("package"));

            $cus = Customer::find($customer_id);

            $blnc  = $cus->balance;
            $pric = $pack->ad_price;

            if($blnc >=$pric){
                $newBalance = $blnc - $pric;

                Customer::where("id",$customer_id)->update(
                    [
                        "balance" => $newBalance
                    ]
                );



                $ads = new Advertiser();
                $ads->package_id = $request->input("package");
                $ads->website_url = $request->input("url");
                $ads->website_title = $request->input("en_title");
                $ads->website_artitle = $request->input("ar_title");
                $ads->expire_after = 30;
                $ads->status = "active";
                $ads->customer_id = $customer_id;
                $ads->save();



                $py = new PaymentsHistory();
                $py->customer_id = $customer_id;
                $py->payment_value = $pack->ad_price;
                $py->payment_type = "pay";
                $py->refrance = $ads->id;
                $py->account = $cus->email;
                $py->gateway = "Internal";
                $py->status = "completed";
                $py->save();

                $isAdded = true;
            }






        }

        return view("FrontEnd.Panel.advertisement",compact("ads","customer","packages","isAdded"));

    }


    public function  mypackage(Request $request){
        $customer = Customer::find($request->session()->get("customer_id"));
        $packages = CustomerPackages::where([["customer_id",$customer->id],["status","active"]])->orWhere([["customer_id",$customer->id],["status","pending"]])->paginate();
        return view("FrontEnd.Panel.mypackage",compact("customer","packages"));

    }


    public function  addnewplan(Request $request){
        $packages =  Package::where("status","active")->get()->toArray();

        $customer_id = $request->session()->get("customer_id");

        if($request->method()=="POST"){
            //return $request->input();
            $request->validate([
                "quantity"=>"required|min:1",
                "package"=>"required|min:1"
            ]);

            $co =  CustomerPackages::where([["customer_id",$customer_id],["package_id",$request->input("package")],["status","active"]])->orWhere([["customer_id",$customer_id],["package_id",$request->input("package")],["status","pending"]])->count();



//            var_dump($cus_package_obj);
//            exit();

            if($co>=1){

            }else{
                $cus_package_obj = new CustomerPackages;
                $cus_package_obj->customer_id = $customer_id;
                $cus_package_obj->quantity = $request->input("quantity");
                $cus_package_obj->package_id = $request->input("package");
                $cus_package_obj->status = "pending";
                $cus_package_obj->save();
                Customer::where("id",$customer_id)->update([
                    "last_package_hsitory"=> $cus_package_obj->id,
                    "next_package"=> $request->input("package")
                ]);
                return redirect("checkout");
            }



        }

        return view("FrontEnd.Panel.addnewplan",compact("customer","packages"));
    }
}
