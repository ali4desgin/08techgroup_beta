
@extends("BackEnd.Layout.Dashboard.app")


@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="header text-center">{{ $package->ar_title }}</div>
        </div>
    </div>




     <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <span>{{  $customers_count }}</span>
                    <h5><i class="fa fa-user"></i> عميل مشترك</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <span>{{ $profits  / 7}}</span>
                    <h5><i class="fa fa-bars"></i> متوسط ارباح اسبوعية</h5>
                </div>
            </div>
        </div>
        {{--<div class="col-md-3">--}}
            {{--<div class="panel panel-primary">--}}
                {{--<div class="panel-body">--}}
                    {{--<span>2323</span>--}}
                    {{--<h5><i class="fa fa-image"></i> كورس مرفوع</h5>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-md-3">--}}
            {{--<div class="panel panel-primary">--}}
                {{--<div class="panel-body">--}}
                    {{--<span>2323</span>--}}
                    {{--<h5><i class="fa fa-paypal"></i> عملية دفع اليوم</h5>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}



     </div>


     <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5><i class="fa fa-users"></i> العملاء المشتركين </h5>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>علي عبدالله</li>
                        <li>حسين</li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5><i class="fa fa-users"></i> العملاء المشتركين </h5>
                </div>
                <div class="panel-body">
                    <span>2323</span>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
