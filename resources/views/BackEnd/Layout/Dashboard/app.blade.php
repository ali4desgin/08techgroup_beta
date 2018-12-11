
<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Homepage - tabler.github.io - a responsive, flat and full featured admin template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{ url("public/backend/assets/js/require.min.js")}}"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>
    <!-- Dashboard Core -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="{{ url("public/backend/assets/css/dashboard.css") }}" rel="stylesheet" />
    <link href="{{ url("public/backend/custom.css") }}" rel="stylesheet" />
    <script src="{{ url("public/backend/assets/js/dashboard.js") }}"></script>
    {{--<!-- c3.js Charts Plugin -->--}}
    {{--<link href="{{ url("public/backend/assets/plugins/charts-c3/plugin.css") }}" rel="stylesheet" />--}}
    {{--<script src="{{ url("public/backend/assets/plugins/charts-c3/plugin.js") }}"></script>--}}
    {{--<!-- Google Maps Plugin -->--}}
    <link href="{{ url("public/backend/assets/plugins/maps-google/plugin.css") }}" rel="stylesheet" />
    <script src="{{ url("public/backend/assets/plugins/maps-google/plugin.js") }}"></script>
    {{--<!-- Input Mask Plugin -->--}}
    <script src="{{ url("public/backend/assets/plugins/input-mask/plugin.js") }}"></script>

</head>
<body class="">
<div class="page">
    <div class="page-main">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="./index.html">
                        <img src="{{ url('public/frontend/assets/images/logo2.png')}}" class="header-brand-img" alt="tabler logo">
                    </a>

                    <div class="dropdown d-none d-md-flex">
                        <a class="nav-link icon" data-toggle="dropdown">
                            <i class="fe fe-bell"></i>
                            <span class="nav-unread"></span>
                        </a>

                    </div>
                    <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    {{--<div class="col-lg-3 ml-auto">--}}
                        {{--<form class="input-icon my-3 my-lg-0">--}}
                            {{--<input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">--}}
                            {{--<div class="input-icon-addon">--}}
                                {{--<i class="fe fe-search"></i>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/dashboard') }}" class="nav-link active">الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/customers') }}" class="nav-link">المستخدمين</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/packages') }}" class="nav-link">الباقات</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/tickets') }}" class="nav-link">التذاكر</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/advertisers') }}" class="nav-link">الاعلانات</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/payments') }}" class="nav-link">سجلات الدفع</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/paymentsgateways') }}" class="nav-link">البوابات</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/notifiactions') }}" class="nav-link">الاشعارات</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('adminpanel/content') }}" class="nav-link">الاعدادات</a>
                            </li>


                            {{--<li class="nav-item">--}}
                                {{--<a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Interface</a>--}}
                                {{--<div class="dropdown-menu dropdown-menu-arrow">--}}
                                    {{--<a href="./cards.html" class="dropdown-item ">Cards design</a>--}}
                                    {{--<a href="./charts.html" class="dropdown-item ">Charts</a>--}}
                                    {{--<a href="./pricing-cards.html" class="dropdown-item ">Pricing cards</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item dropdown">--}}
                                {{--<a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Components</a>--}}
                                {{--<div class="dropdown-menu dropdown-menu-arrow">--}}
                                    {{--<a href="./maps.html" class="dropdown-item ">Maps</a>--}}
                                    {{--<a href="./icons.html" class="dropdown-item ">Icons</a>--}}
                                    {{--<a href="./store.html" class="dropdown-item ">Store</a>--}}
                                    {{--<a href="./blog.html" class="dropdown-item ">Blog</a>--}}
                                    {{--<a href="./carousel.html" class="dropdown-item ">Carousel</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item dropdown">--}}
                                {{--<a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Pages</a>--}}
                                {{--<div class="dropdown-menu dropdown-menu-arrow">--}}
                                    {{--<a href="./profile.html" class="dropdown-item ">Profile</a>--}}
                                    {{--<a href="./login.html" class="dropdown-item ">Login</a>--}}
                                    {{--<a href="./register.html" class="dropdown-item ">Register</a>--}}
                                    {{--<a href="./forgot-password.html" class="dropdown-item ">Forgot password</a>--}}
                                    {{--<a href="./400.html" class="dropdown-item ">400 error</a>--}}
                                    {{--<a href="./401.html" class="dropdown-item ">401 error</a>--}}
                                    {{--<a href="./403.html" class="dropdown-item ">403 error</a>--}}
                                    {{--<a href="./404.html" class="dropdown-item ">404 error</a>--}}
                                    {{--<a href="./500.html" class="dropdown-item ">500 error</a>--}}
                                    {{--<a href="./503.html" class="dropdown-item ">503 error</a>--}}
                                    {{--<a href="./email.html" class="dropdown-item ">Email</a>--}}
                                    {{--<a href="./empty.html" class="dropdown-item ">Empty page</a>--}}
                                    {{--<a href="./rtl.html" class="dropdown-item ">RTL mode</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item dropdown">--}}
                                {{--<a href="./form-elements.html" class="nav-link"><i class="fe fe-check-square"></i> Forms</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="./gallery.html" class="nav-link"><i class="fe fe-image"></i> Gallery</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="./docs/index.html" class="nav-link"><i class="fe fe-file-text"></i> Documentation</a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3 my-md-5">
            <div class="container">
                @yield("content")
            </div>
        </div>
    </div>
    {{--<div class="footer">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-8">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-6 col-md-3">--}}
                            {{--<ul class="list-unstyled mb-0">--}}
                                {{--<li><a href="#">First link</a></li>--}}
                                {{--<li><a href="#">Second link</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="col-6 col-md-3">--}}
                            {{--<ul class="list-unstyled mb-0">--}}
                                {{--<li><a href="#">Third link</a></li>--}}
                                {{--<li><a href="#">Fourth link</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="col-6 col-md-3">--}}
                            {{--<ul class="list-unstyled mb-0">--}}
                                {{--<li><a href="#">Fifth link</a></li>--}}
                                {{--<li><a href="#">Sixth link</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="col-6 col-md-3">--}}
                            {{--<ul class="list-unstyled mb-0">--}}
                                {{--<li><a href="#">Other link</a></li>--}}
                                {{--<li><a href="#">Last link</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 mt-4 mt-lg-0">--}}
                    {{--Premium and Open Source dashboard template with responsive and high quality UI. For Free!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <footer class="footer">
        {{--<div class="container">--}}
            {{--<div class="row align-items-center flex-row-reverse">--}}
                {{--<div class="col-auto ml-lg-auto">--}}
                    {{--<div class="row align-items-center">--}}
                        {{--<div class="col-auto">--}}
                            {{--<ul class="list-inline list-inline-dots mb-0">--}}
                                {{--<li class="list-inline-item"><a href="./docs/index.html">Documentation</a></li>--}}
                                {{--<li class="list-inline-item"><a href="./faq.html">FAQ</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="col-auto">--}}
                            {{--<a href="https://github.com/tabler/tabler" class="btn btn-outline-primary btn-sm">Source code</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">--}}
                    {{--Copyright © 2018 <a href=".">Tabler</a>. Theme by <a href="https://codecalm.net" target="_blank">codecalm.net</a> All rights reserved.--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ url("public/backend/js/app.js") }}" ></script>

    <script>$(".confirm").click(function(){
            return confirm("هل انت متأكد من هذا الاجراء ؟ ");
        });
    </script>
</div>
</body>
</html>
