<?php

namespace App\Http\Controllers\BackEnd;

use App\Customer;
use App\TicketMessages;
use App\Tickets;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    //

    public function index(){
        $tickets = Tickets::orderBy("id","desc")->get()->toArray();

        return view("BackEnd.Dashboard.Tickets.index",compact("tickets"));
    }

    public function view($ticket_id,Request $request){


        $ticket = Tickets::find($ticket_id);
        if(empty($ticket)){
            return back();
        }



        $customer = Customer::find($ticket->customer_id);

        $messages = TicketMessages::where("ticket_id",$ticket_id)->orderBy("id","desc")->get()->toArray();



        if($request->method()=="POST"){
            $request->validate([
                "message"=>"required|min:5"

            ]);

            $mticket = new TicketMessages;
            $mticket->ticket_id = $ticket->id;
            $mticket->isAdmin = 1;
            $mticket->content = $request->input("message");
            $mticket->save();


            Tickets::where("id",$ticket_id)->update([
               "status"=>"adminreplay"
            ]);
            return back();

        }


        return view("BackEnd.Dashboard.Tickets.view",compact("messages","ticket","customer"));

    }
}
