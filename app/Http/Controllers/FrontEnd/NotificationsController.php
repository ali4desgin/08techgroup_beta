<?php

namespace App\Http\Controllers\FrontEnd;

use App\CustomerPackages;
use App\Notifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class NotificationsController extends Controller
{


    public  function notifications(Request $request){

        $customer_id = $request->session()->get("customer_id");
        //::where("customer_id",$customer_id)->
        $notifications = Notifications::where("customer_id",$customer_id)->paginate(20);
        return view("FrontEnd.Panel.notifications",compact("notifications"));
    }


    public  function notification(Request $request,$notification_id){

//        $customer_id = $request->session()->get("customer_id");
        $notification = Notifications::find($notification_id);
        return view("FrontEnd.Panel.notification",compact("notification"));
    }

}
