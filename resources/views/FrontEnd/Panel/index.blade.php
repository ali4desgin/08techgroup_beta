@extends("FrontEnd.Layout.Panel.master")

    @section("content")
        <!-- Content -->
        @if(count($packages)>=1)
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count">

                                                    {{ $total_profit }}
                                                </span></div>
                                            <div class="stat-heading">Today Profit</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{ count($packages) }}</span></div>
                                            <div class="stat-heading"> Packages count</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">

                                    @if($days_later_for_making_new_request)
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-1">
                                                <i class="pe-7s-cash"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">

                                                    {{  $days_later_for_making_new_request }}

                                                </span></div>
                                                    <div class="stat-heading">days to request</div>
                                                </div>
                                            </div>
                                        </div>



                                    @else
                                    <div class="stat-widget-five">
                                        <a href="{{ url("/sendprofit") }}" class="btn btn-success btn-sm">Get Your Profit</a>
                                    </div>

                                    @endif

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count">
                                                    {{ $customer->balance }}

                                                </span></div>
                                            <div class="stat-heading">Total Balance</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                {{--<div class="row">--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<div class="card">--}}
                            {{--<div class="card-body">--}}
                                {{--<h4 class="box-title">Advertisements </h4>--}}
                            {{--</div>--}}
                            {{--<div class="container">--}}
                            {{--@if(!empty($advertisment))--}}

                                {{--<div class="row">--}}
                                    {{--@foreach($advertisment as $adver)--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="card border border-secondary">--}}
                                            {{--<div class="card-header">--}}
                                                {{--<strong class="card-title text-center">{{ $adver['website_title'] }}</strong>--}}
                                            {{--</div>--}}
                                            {{--<div class="card-body">--}}
                                                {{--<p class="card-text">--}}
                                                    {{--<img src="{{ $adver['website_logo'] }}" width="90px"/>--}}
                                                    {{--<a href="{{ $adver['website_url'] }}" class="btn btn-primary btn-sm btn-block" target="_blank">Start browsering</a>--}}
                                                {{--</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--</div> <!-- /.row -->--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            {{--<div class="card-body"></div>--}}
                        {{--</div>--}}
                    {{--</div><!-- /# column -->--}}
                {{--</div>--}}
                {{--<!--  /Traffic -->--}}
                {{--<div class="clearfix"></div>--}}
                {{----}}
				
				
            </div>
            <!-- .animated -->

            @else
            @if($customer->next_package!=0 and $customer->activity=="waitforpayment")
                <a href="{{ url("checkout") }}" class="btn btn-red btn-block">You should Complete your payment click here</a>
            @else 
            <a href="" class="btn btn-red btn-block">We are proccessing your request now</a>
            @endif
            @endif



        @endsection
