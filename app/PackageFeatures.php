<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageFeatures extends Model
{
    //
	
	protected $table = "package_features";
	
	public function package()
    {
		
        // return $this->belongsTo('App\Package');
    }    
	
}
