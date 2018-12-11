<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    //
	
	protected $table = "notifications";
	
	
	
	public static function  nofitications_count()
	{
		
		$count = Notifications::where("viewed",0)->count();
		return $count;
	}


    public static function  user_nofitications_count($customer_id)
    {

        $count = Notifications::where([
            ["isAdmin",0],
            ["viewed",0],
            ["customer_id",$customer_id]
        ])->count();
        return $count;
    }
}
