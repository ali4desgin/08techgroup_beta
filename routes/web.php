<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// forntend routes





//Auth::routes();

Route::match(['get','post'],"/","FrontEnd\HomeController@index");


Route::group(["middleware" => "UserLogged"],function(){
    Route::match(['get','post'],'/login', 'FrontEnd\HomeController@login');
    Route::match(['get','post'],'/register', 'FrontEnd\HomeController@register');
});



Route::group(["middleware" => "UserNotLogged"],function(){


    Route::match(['get','post'],'/logout', 'FrontEnd\HomeController@logout');


    Route::group(["middleware"=>"CheckOutComplete"],function(){

        Route::match(['get','post'],"/profile","FrontEnd\PanelController@profile");
        Route::match(['get','post'],"/ads","FrontEnd\PanelController@advertisement");
        Route::match(['get','post'],"mypanel","FrontEnd\PanelController@index");
        Route::match(['get','post'],"/myprofit","FrontEnd\PanelController@myprofit");
        Route::match(['get','post'],"/myplan","FrontEnd\PanelController@myplan");
        Route::match(['get','post'],"/mypackage","FrontEnd\PanelController@mypackage");
        Route::match(['get','post'],"/addnewplan","FrontEnd\PanelController@addnewplan");
        Route::match(['get','post'],"/tickets","FrontEnd\PanelController@tickets");
        Route::match(['get','post'],"/view_ticket/{ticket_id}","FrontEnd\PanelController@view_ticket");

        Route::match(['get','post'],"payments_history","FrontEnd\PaymentsController@payments_history");



        Route::match(['get','post'],"notifications","FrontEnd\NotificationsController@notifications");
        Route::match(['get','post'],"notification/{noitifcation_id}","FrontEnd\NotificationsController@notification");


        Route::match(['get','post'],"profile","FrontEnd\HomeController@profile");


        Route::match(['get','post'],"balance","FrontEnd\HomeController@balance");
        Route::match(['get','post'],"sendprofit","FrontEnd\PaymentsController@sendprofit");





        Route::match(['get','post'],"mywallet","FrontEnd\HomeController@walletinfo");
        Route::match(['get','post'],"advertisement","FrontEnd\PanelController@advertisement");


    });






    Route::group(['middleware' => 'CheckOutNotComplete'],function() {
        Route::group(['prefix' => 'checkout'], function () {

            Route::match(['get', 'post'], "/", "FrontEnd\PaymentsController@index");
            Route::post("/redirect", "FrontEnd\PaymentsController@redirect");
            Route::match(['get','post'],"/blockchain", "FrontEnd\PaymentsController@blockchain");
            Route::match(['get','post'],"/blockchain", "FrontEnd\PaymentsController@blockchain");
            Route::match(['get','post'],"/blockchain/confirm", "FrontEnd\PaymentsController@blockchainconfirm");



            Route::match(['get', 'post'], "mbok", "FrontEnd\PaymentsController@mbok");
            Route::match(['get', 'post'], "mbok/confirm", "FrontEnd\PaymentsController@mbok_confirm");


        });


        Route::group(['prefix' => 'paypal'], function () {
            Route::match(['get', 'post'], "create", "FrontEnd\PaymentsController@create_paypal");




            Route::match(['get', 'post'], "success", function () {
                return "<h1 align=\"center\">PayPal Success Payment</h1>";
            });
            Route::match(['get', 'post'], "cancel", function () {
                return "<h1 align=\"center\">PayPal Fail Payment</h1>";
            });
        });




    });




});






// server feedback
Route::match(['get', 'post'], "paypal/notify", "FrontEnd\PaymentsController@paypal_notify");






// genral pages
Route::match(['get', 'post'], "sendmail", "FrontEnd\HomeController@sendmail");
Route::match(['get', 'post'], "about", "FrontEnd\HomeController@about");
Route::match(['get', 'post'], "privacy", "FrontEnd\HomeController@privacy");
Route::match(['get', 'post'], "contact", "FrontEnd\HomeController@contact");











// admin panel routes
Route::group(['prefix' => 'adminpanel'],function(){

            Route::group(["middleware" => "AdminNotLogin"],function() {

                    Route::match(['get', 'post'], '/', "BackEnd\AdminController@index");

            });



        Route::group(['middleware' => 'AdminLogin'], function () {
            Route::match(['get', 'post'], '/dashboard', 'BackEnd\DashboardController@index');

            // packages routes
            Route::match(['get', 'post'], '/packages', 'BackEnd\PackageController@index');
            Route::match(['get', 'post'], '/addpackage', 'BackEnd\PackageController@add');


            Route::match(['get', 'post'], '/create_payment', 'BackEnd\PaymentsController@create_payment');


            Route::group(['prefix' => 'package'], function () {
                Route::match(['get', 'post'], '/delete/{package_id}', 'BackEnd\PackageController@delete');
                Route::match(['get', 'post'], '/edit/{package_id}', 'BackEnd\PackageController@edit');
                Route::match(['get', 'post'], '/view/{package_id}', 'BackEnd\PackageController@view');
                Route::post('/add_daily_profit', 'BackEnd\PackageController@add_daily_profit');
                Route::match(['get', 'post'], 'edit/{package_id}', 'BackEnd\PackageController@edit');
                Route::match(['get', 'post'], 'profit/{package_id}', 'BackEnd\PackageController@profit');
                Route::match(['get', 'post'], '/features/{package_id}', 'BackEnd\PackageController@features');
                Route::get('/remove_feature/{feature_id}', 'BackEnd\PackageController@remove_feature');


                Route::get('/block/{feature_id}', 'BackEnd\PackageController@block');
                Route::get('/active/{feature_id}', 'BackEnd\PackageController@active');
            });


            // customer routes
            Route::match(['get', 'post'], '/customers', 'BackEnd\CustomerController@index');



            Route::match(['get', 'post'], '/tickets', 'BackEnd\SupportController@index');
            Route::match(['get', 'post'], '/ticket/{ticket_id}', 'BackEnd\SupportController@view');

            Route::group(['prefix' => 'customer'], function () {
                Route::match(['get', 'post'], '/delete/{customer_id}', 'BackEnd\CustomerController@delete');
                Route::match(['get', 'post'], '/edit/{customer_id}', 'BackEnd\CustomerController@edit');
                Route::match(['get', 'post'], '/view/{customer_id}', 'BackEnd\CustomerController@view');
                Route::match(['get', 'post'], '/payments/{customer_id}', 'BackEnd\CustomerController@payments');
                Route::match(['get', 'post'], '/packages/{customer_id}', 'BackEnd\CustomerController@packages');
            });


            // profits
            Route::match(['get', 'post'], '/daily_profits', 'BackEnd\ProfitsController@daily_profits');


            Route::group(['prefix' => 'ajax'], function () {
                Route::match(['get', 'post'], '/package/details/{package_id}', 'BackEnd\PackageController@package_json_details');
            });


            // ajax pages
            Route::group(['prefix' => 'ajax'], function () {
                Route::match(['get', 'post'], '/package/details/{package_id}', 'BackEnd\PackageController@package_json_details');
            });


            // content pages
            Route::group(['prefix' => 'content'], function () {
                Route::match(['get', 'post'], '/', 'BackEnd\ContentController@index');
            });


            // payments gateways
            Route::group(['prefix' => 'paymentsgateways'], function () {
                Route::match(['get', 'post'], '/', 'BackEnd\DashboardController@payments_gateways');
            });

            Route::match(['get', 'post'], "gateway/{payment_id}", 'BackEnd\DashboardController@gateway');

            Route::match(['get', 'post'], "notifiactions", 'BackEnd\DashboardController@notifiactions');

            Route::get("notificationreaded/{notification_id}", 'BackEnd\DashboardController@read_notify');


            //payments
            Route::get("payments", 'BackEnd\PaymentsController@index');


            Route::match(["post", "get"], "payment/{payment_id}", 'BackEnd\PaymentsController@payment');


            //advertisers
            Route::get("advertisers", 'BackEnd\AdvertisersController@index');


            // logout

            Route::get("logout", "BackEnd\AdminController@logout");
        });


});









