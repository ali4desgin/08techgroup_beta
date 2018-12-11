<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $table = "packages";
	
	
	public function features()
    {
		return \App\PackageFeatures::where("package_id",$this->id)->get()-toArray(); 
    }   
}
