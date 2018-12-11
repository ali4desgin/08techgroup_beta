$(function(){
	'use strict';
	$(".confirm").click(function(){
		return confirm("هل انت متأكد من هذا الاجراء ؟ ");
	});
	
	
	// add daily button packages (index.blade.php) 
	// view model that allow admin to add new daily profit for any package
	$(".addDailyProfitButtonInPackesIndexView").click(function(event){
		var id = $(this).data("id"),
			title = $(this).data("title"),
			price = $(this).data("price"),
		modal = $("#addDailyProfitModelInPackesIndexView"),
		modal_package_id =  $("#addDailyProfitModelInPackesIndexView #package_id"),
		modal_profit_mode =  $("#addDailyProfitModelInPackesIndexView #profit_mode"),
		modal_package_title =  $("#addDailyProfitModelInPackesIndexView #package_title"),
		modal_profit_value =  $("#addDailyProfitModelInPackesIndexView #profit_value");
		
		modal_package_id.val(id);
		modal_package_title.val(title);
		
		
		modal.modal('show');	
		
		//if admin try to change the profit mode 
		modal_profit_mode.change(function(){
			var mod = $(this).val();
				
			if(mod == "1"){
				modal_profit_value.attr("placeholder","بالنسبة المئوية من قيمة الاشتراك   ");
				modal_profit_value.attr("max","100");
			}else{
				modal_profit_value.attr("placeholder","الربح بالدولار مثلا 20 دولار للباقة");
				modal_profit_value.attr("max",price);
			}
		});

		
	});
});
