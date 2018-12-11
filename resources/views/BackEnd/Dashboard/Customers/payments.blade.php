@extends("BackEnd.Layout.Dashboard.app")

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="header text-center">
                {{ $customer->email }}

            </div>
        </div>
    </div>

        <div class="row">
		<!-- <div class="col-md-4">
			<div class="jumbotron">
			  	<div clas="">
			  	  	<h5 class="heading-text-center"><i class="fa fa-bell"></i> الاشعارات الاخيرة</h5>
					<ul class="list-group">
					     <li class="list-group-item">عملية دفع</li>
					     <li class="list-group-item">اشعار طلب سحب</li>
					     <li class="list-group-item">رسالة من مستخدم</li>

					</ul>
			  	</div>
			</div>
		</div> -->
		
		<div class="col-md-12">
			<ul class="list-group">
				@if(!empty($payments))
					
					{{--@foreach($payments as $payment)--}}
						{{--<div class="row text-center">--}}
			     			{{--<div class="form-group">--}}
								{{--<li class="list-group-item">--}}
									{{--<div class="row">--}}
										{{--<div class="col-md-4"></div>--}}
										{{--<div class="col-md-3"></div>--}}
										{{--<div class="col-md-1">--}}
											{{----}}
											{{--@if($payment['payment_type']==1)--}}
												{{--<span class="btn btn-danger btn-sm">خصم</span>--}}
											{{--@elseif($payment['payment_type']==2)--}}
												{{--<span class="btn btn-info btn-sm">مطلوبة للسحب</span>--}}
											{{--@elseif($payment['payment_type']==3)--}}
												{{--<span class="btn btn-warning btn-sm">شراء باقة</span>--}}
											{{--@else--}}
												{{--<span class="btn btn-success btn-sm">ارباح</span>--}}
											{{--@endif--}}
											{{----}}
										{{--</div>--}}
										{{--<div class="col-md-2">--}}
											{{--<span class="gre_block">{{ $payment->payment_value }} USD</span></div>--}}
										{{--<div class="col-md-2">{{ $payment->created_at }}</div>--}}
									{{--</div>--}}
								{{--</li>--}}
							{{--</div>--}}
						{{--</div>--}}
				 	{{--@endforeach--}}


                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> العمليات المالية </h3>
                                </div>
                                <div class="table-responsive">

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
                                        @endforeach
                                        </tbody>
                                    </table>                </div>
                            </div>
                        </div>


					
					<div class="text-center">
						{{ $payments->links() }}
					</div>
				 @else
				 	<div class="alert alert-info text-center">
				 		<i class="fa fa-bell-slash"></i> لاتوجد اشعارات حاليا
				 	</div>
				 @endif
			</ul>
		</div>
	</div>
	
@endsection
