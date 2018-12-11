<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    //
	
	public function index(Request $request)
	{
		
		$editDone = "";
        
		if($request->method()=="POST"){
			$job = $request->input("editType");
			if($job=="header"){
				$header_string_edit =
					 file_get_contents(url("public/json/header.json"));
				$header_edit = json_decode($header_string_edit,true);
			
			
				$header_edit["ar_title"] = $request->input("ar_title");
				$header_edit["en_title"] = $request->input("en_title");
				$header_edit["ar_description"] =
					 $request->input("ar_desc");
				$header_edit["en_description"] =
					 $request->input("en_desc");
				$header_edit["keywords"] = $request->input("keywords");
				$header_edit["code"] = $request->input("code");
				$newJsonString = json_encode($header_edit);
			
				file_put_contents(url("public/json/header.json"),$newJsonString);
				
				$editDone = "تم تعديل بيانات القائمة العلوية بنجاح";
			}else if($job=="footer"){
				$footer_string_edit =
					 file_get_contents(url("public/json/footer.json"));
				$footer_edit = json_decode($footer_string_edit,true);
			
			
				$footer_edit["ar_desc"] = $request->input("ar_desc");
				$footer_edit["en_desc"] = $request->input("en_desc");
				$footer_edit["ar_copyright"] = $request->input("ar_copyright");
				$footer_edit["en_copyright"] = $request->input("en_copyright");
				$newJsonString = json_encode($footer_edit);
			
				file_put_contents("json/footer.json",$newJsonString);
				$editDone = "تم تعديل بيانات القائمة السفلية بنجاح";
			}else if($job=="about_us"){
				$aboutus_string_edit =
					 file_get_contents(url("public/json/aboutus.json"));
				$aboutu_edit = json_decode($aboutus_string_edit,true);
			
			
				$aboutu_edit["ar_desc"] = $request->input("ar_desc");
				$aboutu_edit["en_desc"] = $request->input("en_desc");
				$aboutu_edit["ar_copyright"] = $request->input("ar_copyright");
				$aboutu_edit["en_copyright"] = $request->input("en_copyright");
				$newJsonString = json_encode($aboutu_edit);
			
				file_put_contents(url("public/json/aboutus.json"),$newJsonString);
				$editDone = "تم تعديل بيانات  من نحن بنجاح";
			}
			
			
			
			
			
			
		}
		
		
		
		$header_string = file_get_contents(url("public/json/header.json"));
		$header = json_decode($header_string,true);
		
		
		$footer_string = file_get_contents(url("public/json/footer.json"));
		$footer = json_decode($footer_string,true);
		
		
		//return $header_json;
		return view("BackEnd.Dashboard.Content.index",compact("editDone","header","footer"));
	}
}
