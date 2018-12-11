<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller,\App\Advertiser;

class AdvertisersController extends Controller
{
    //
	
	public function index(){
		$advertisers = Advertiser::get()->toArray();
		return view("BackEnd.Dashboard.Advertiser.index",compact("advertisers"));
	}
}
