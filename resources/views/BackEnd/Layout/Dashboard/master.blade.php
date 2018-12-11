<?php

$notification_count = \App\Notifications::nofitications_count();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>8Tech Group</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/backend/css/main.css') }}" />
        
        
    </head>
    <body>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('adminpanel/dashboard') }}">Admin</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('adminpanel/dashboard') }}"><i 
					class="fa fa-home"></i> الرئيسية <span
					 class="sr-only">(current)</span></a></li>
                <li><a href="{{ url('adminpanel/customers') }}"> <i 
					class="fa fa-users"></i> ادارة العملاء</a></li>
                <li><a href="{{ url('adminpanel/packages') }}"> <i 
					class="fa fa-bars"></i> ادارة الباقات</a></li>
                <li><a href="{{ url('adminpanel/paymentsgateways') }}"> <i class="fa fa-money-bill-alt"></i>   ادارة بوابات الدفع </a></li>
                <li><a href="{{ url('adminpanel/payments') }}"> <i class="fa fa-asterisk"></i> سجلات الدفع</a></li>
                <li><a href="{{ url('adminpanel/advertisers') }}"> <i class="fa fa-link"></i>   ادارة المعلينين</a></li>
                <li><a href="{{ url('adminpanel/content') }}"> <i class="fab fa-windows"></i> ادارة المحتوى</a></li>
				<li><a href="{{ url('adminpanel/notifiactions') }}"> <i class="fa fa-bell"></i>
					
					 الاشعارات 
				 <span class="badge 
				 @if($notification_count>0)
				 	alert-danger
				 @endif
				  ">
				 	
					{{  $notification_count }}
					
				 </span>
				 </a>
				 </li>
				<li><a href="{{ url('adminpanel/logout') }}" class="confirm"> <i class="fa fa-sign-out-alt"></i>  تسجيل خروج</a></li>
            </ul>
            
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>


            <div class="leftmenu">

            </div>
            <div class="rightmenu">
                <div class="container">
                @yield("content")
                <div class="footer">
                    <p>جميع الحقوق محفوظة <i class="fa fa-copyright"></i> 2018 08Tech
                        Group</p>
                    <p class="gray_1">تصميم وبرمجة <i class="fa fa-desktop"></i> <a href="http://development-master"
                                                                                    class="gray_2">Dev Master</a></p>
                </div>
                </div>
            </div>


		
        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <!-- Latest compiled and minified js -->
        <script src="{{ asset('public/backend/js/main.js') }}"></script>
    </body>
</html>
