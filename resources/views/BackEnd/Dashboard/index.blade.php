@extends("BackEnd.Layout.Dashboard.app")

@section("content")
    <div class="row row-cards">
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right">
                        0
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">{{ $data["count"]["customers"] }}</div>
                    <div class="text-muted mb-4">المستخدمين</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right">
                        0
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">{{ $data["count"]["new_tickets"] }}</div>
                    <div class="text-muted mb-4">التذاكر الجديدة</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                        %{{ ($data["count"]["waiting_customers"] / $data["count"]["customers"] ) * 100 }}
                        <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">{{ $data["count"]["waiting_customers"] }}</div>
                    <div class="text-muted mb-4">قيد الانتظار</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                        0
                        <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">$<?php

                        if($data["sum"]["deposits"] > 1000000 ) {
                            echo floor($data["sum"]["deposits"] / 1000)."k";
                        }
                        if($data["sum"]["deposits"] > 1000  ) {
                            echo floor($data["sum"]["deposits"] / 1000)."k";
                        }else{
                            echo $data["sum"]["deposits"];
                        }
                        ?></div>
                    <div class="text-muted mb-4">مجموع الايداع</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right ">
                        0
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">$<?php

                        if($data["sum"]["profits"] > 1000000 ) {
                            echo floor($data["sum"]["profits"] / 1000)."k";
                        }
                        if($data["sum"]["profits"] > 1000  ) {
                            echo floor($data["sum"]["profits"] / 1000)."k";
                        }else{
                            echo $data["sum"]["profits"];
                        }
                    ?></div>
                    <div class="text-muted mb-4">مجموع الارباح </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right">
                        0
                        <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">$<?php

                        if($data["sum"]["withdump"] > 1000000 ) {
                            echo floor($data["sum"]["withdump"] / 1000)."k";
                        }
                        if($data["sum"]["withdump"] > 1000  ) {
                            echo floor($data["sum"]["withdump"] / 1000)."k";
                        }else{
                            echo $data["sum"]["withdump"];
                        }
                        ?></div>
                    <div class="text-muted mb-4">مجموع السحب</div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="h5">New feedback</div>
                            <div class="display-4 font-weight-bold mb-4">62</div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-red" style="width: 28%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="h5">ارباح اليوم</div>
                            <div class="display-4 font-weight-bold mb-4">$<?php

                                if($data["sum"]["today_profits"] > 1000000 ) {
                                    echo floor($data["sum"]["today_profits"] / 1000)."k";
                                }
                                if($data["sum"]["today_profits"] > 1000  ) {
                                    echo floor($data["sum"]["today_profits"] / 1000)."k";
                                }else{
                                    echo $data["sum"]["today_profits"];
                                }
                                ?></div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" style="width: 84%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Projects</h2>
                </div>
                <table class="table card-table">
                    <tbody><tr>
                        <td>Admin Template</td>
                        <td class="text-right">
                            <span class="badge badge-default">65%</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Landing Page</td>
                        <td class="text-right">
                            <span class="badge badge-success">Finished</span>
                        </td>
                    </tr>

                    </tbody></table>
            </div>
        </div>


        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-blue mr-3">
                      <i class="fe fe-dollar-sign"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><a href="javascript:void(0)">132 <small>Sales</small></a></h4>
                        <small class="text-muted">12 waiting payments</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-green mr-3">
                      <i class="fe fe-shopping-cart"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><a href="javascript:void(0)">78 <small>Orders</small></a></h4>
                        <small class="text-muted">32 shipped</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-red mr-3">
                      <i class="fe fe-users"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><a href="javascript:void(0)">1,352 <small>Members</small></a></h4>
                        <small class="text-muted">163 registered today</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-yellow mr-3">
                      <i class="fe fe-message-square"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><a href="javascript:void(0)">132 <small>Comments</small></a></h4>
                        <small class="text-muted">16 waiting</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> العمليات المالية </h3>  - <a href="{{ url("") }}"> عرض الكل</a>
                </div>
                <div class="table-responsive">
                    @if(!empty($payments))

                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>المستخدم</th>
                            <th>البوابة</th>
                            <th>رقم المرجع</th>
                            <th>التاريخ</th>
                            <th>النوع</th>
                            <th>الحالة</th>
                            <th>القيمة</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                        <?php

                            $customer = \App\Customer::find($payment->customer_id);
//                            $customer = \App\Customer::find($payment->customer_id);

                        if(!empty($customer)){
                        ?>
                        <tr>
                            <td><span class="text-muted">{{ $payment->id }}</span></td>
                            <td><a href="{{ url( '/adminpanel/customer/view/' . $payment->customer_id ) }}" class="text-inherit">{{ $customer->email }}</a></td>
                            <td>
                                {{ $payment->gateway }}
                            </td>
                            <td>
                                {{ $payment->refrance }}
                            </td>
                            <td>
                                {{ $payment->created_at }}
                            </td>
                            <td>
                                <?php
                                    if($payment->payment_type=="pay"){
                                        echo "<span class='btn btn-success btn-sm'>ايداع</span>";
                                    }else if($payment->payment_type=="profit"){
                                        echo "<span class='btn btn-primary btn-sm'> ارباح</span>";

                                    }else if($payment->payment_type=="send"){
                                        echo "<span class='btn btn-danger btn-sm'>سحب</span>";
                                    }else {
                                        echo "<span class='btn btn-warning btn-sm'>طلب </span>";
                                    }


                                ?>
                            </td>
                            <td>
                                @if($payment->status=="pending")
                                    <span class="status-icon bg-warning"></span> منتظرة
                                    @elseif($payment->status=="completed")
                                    <span class="status-icon bg-success"></span> تم الدفع
                                    @elseif($payment->status=="PaymentPending")
                                    <span class="status-icon bg-info"></span>  لم يتم الدفع بعد
                                    @else
                                    <span class="status-icon bg-danger"></span> فشلت
                                    @endif

                            </td>
                            <td>${{ $payment->payment_value }}</td>
                            <td class="text-right">
                                <a href="{{ url("adminpanel/payment/".$payment->id ) }}" class="btn btn-secondary btn-sm">عرض</a>

                            </td>

                        </tr>
                        <?php } ?>
                        @endforeach
                        </tbody>
                    </table>@else
                    <div class="alert alert-primary">لا توجد اي عمليات</div>
                    @endif
                </div>
            </div>
        </div>


    </div>
     {{--<div class="row">--}}
        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>303</span>--}}
                {{--<h5><i class="fa fa-users"></i> مستخدم لدينا</h5>--}}
                {{----}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>$8874,00</span>--}}
                {{--<h5><i class="fa fa-eye"></i> رصيد  </h5>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>$8874,00</span>--}}
                {{--<h5>مستخدم</h5>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>2323</span>--}}
                {{--<h5><i class="fa fa-paypal"></i> عملية دفع اليوم</h5>--}}
            {{--</div>--}}
        {{--</div>--}}



     {{--</div>--}}

     {{--<div class="row">--}}
        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>303</span>--}}
                {{--<h5><i class="fa fa-users"></i> مستخدم لدينا</h5>--}}
                {{----}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>$8874,00</span>--}}
                {{--<h5><i class="fa fa-eye"></i> رصيد  </h5>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>$8874,00</span>--}}
                {{--<h5>مستخدم</h5>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>2323</span>--}}
                {{--<h5><i class="fa fa-paypal"></i> عملية دفع اليوم</h5>--}}
            {{--</div>--}}
        {{--</div>--}}



     {{--</div>--}}

     {{--<div class="row">--}}
        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>303</span>--}}
                {{--<h5><i class="fa fa-users"></i> مستخدم لدينا</h5>--}}
                {{----}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>$8874,00</span>--}}
                {{--<h5><i class="fa fa-eye"></i> رصيد  </h5>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>$8874,00</span>--}}
                {{--<h5>مستخدم</h5>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>2323</span>--}}
                {{--<h5><i class="fa fa-paypal"></i> عملية دفع اليوم</h5>--}}
            {{--</div>--}}
        {{--</div>--}}



     {{--</div>--}}

     {{--<div class="row">--}}
        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>303</span>--}}
                {{--<h5><i class="fa fa-users"></i> مستخدم لدينا</h5>--}}
                {{----}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>$8874,00</span>--}}
                {{--<h5><i class="fa fa-eye"></i> رصيد  </h5>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>$8874,00</span>--}}
                {{--<h5>مستخدم</h5>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-md-3">--}}
            {{--<div class="static_tab alert alert-info">--}}
                {{--<span>2323</span>--}}
                {{--<h5><i class="fa fa-paypal"></i> عملية دفع اليوم</h5>--}}
            {{--</div>--}}
        {{--</div>--}}



     {{--</div>--}}
@endsection
