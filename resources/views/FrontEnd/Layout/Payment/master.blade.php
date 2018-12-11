<?php


$customer = \App\Customer::find(Session::get("customer_id"));

?>

<html class="no-js" lang=""><!--<![endif]--><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Checkout</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('public/frontend/payment/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ url('public/frontend/payment/assets/css/style.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">
	<link href="{{ url('public/frontend/payment/custom/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    @yield("style")
</head>
<body>
    <!-- Left Panel -->

    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url("/") }}"><img src="{{ url('public/frontend/assets/images/logo2.png') }}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="{{ url("/") }}"><img src="{{ url('public/frontend/payment/images/logo2.png') }}" alt="Logo"></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        
                        


                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-x5 fa-x5 x5" style="font-size: 30px"></i>
                        </a>

                        <div class="user-menu dropdown-menu">
                            
                            {{--<a class="nav-link" href="{{ url("profile") }}"><i class="fa fa-cog"></i>Settings</a>--}}

                            <a class="nav-link" href="{{ url("logout") }}"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Hello <b>{{ $customer->first_name . " " .$customer->middel_name . " " . $customer->last_name }}</b></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active"><a href="#">Payment</a></li>
                                    <li class="active">checkout</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <!-- .animated -->
			
			
			@yield("content")
    </div><!-- .content -->


    @yield("content3")
    <div class="clearfix"></div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                {{--<div class="col-sm-6">--}}
                    {{--Copyright © 2018 Ela Admin--}}
                {{--</div>--}}
                {{--<div class="col-sm-6 text-right">--}}
                    {{--Designed by <a href="https://colorlib.com">Colorlib</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ url('public/frontend/payment/assets/js/main.js') }}"></script>

@yield("script")


</body></html>
