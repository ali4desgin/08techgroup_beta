@extends("BackEnd.Layout.Dashboard.app")

@section("content")
    <h3 class="header text-center"><a href="{{ url("adminpanel/create_payment") }}" class="btn btn-primary">
            تحرير عملية دفع جديدة
        </a></h3>

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> العمليات المالية </h3>
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
                                if(!empty($customer)){
                                if(!empty($customer)){
                                    $email = $customer->email;
                                }else{
                                    $email = "";
                                }
                                ?>
                                <tr>
                                    <td><span class="text-muted">{{ $payment->id }}</span></td>
                                    <td><a href="{{ url( '/adminpanel/customer/view/' . $payment->customer_id ) }}" class="text-inherit">{{ $email }}</a></td>
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
	
@endsection
