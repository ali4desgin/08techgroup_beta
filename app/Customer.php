<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
	protected $table = "customers";


	public  static  function  getBalance($customer_id){
	    $cus = Customer::find($customer_id);
	    return $cus["balance"];
    }
}
