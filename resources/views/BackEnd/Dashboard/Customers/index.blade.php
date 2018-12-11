@extends("BackEnd.Layout.Dashboard.app")


@section("content")

    <h3 class="header text-center">المستخدمين</h3>
    <div class="">
        <div class="">
            <div class="col-sm-12">
                <form method="get">
                    <div class="row">

                        <div class="col-md-10">

                            <div class="form-group">
                                <input type="text" class="form-control"
                                       placeholder="ابحث في قائمة العملاء"  value="{{ $search_text }}" name="search_keyword">
                            </div>

                        </div>


                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block btn-sm" type="submit">
                                <i class="fa fa-search"></i> بحث
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
	@if(!empty($customers))


        <div class="col-sm-12">
            <div class="card">
                <div class="table-responsive">
                    @if(count($customers) > 0)
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                        <thead>

                        <tr>
                            <th class="text-center w-1"><i class="icon-people"></i></th>
                            <th>البريد</th>
                            <th>الحالة</th>
                            <th class="text-center">عدد الباقات</th>
                            <th>الدولة/الهاتف</th>
                            <th class="text-center">الرصيد</th>
                            <th class="text-center"><i class="icon-settings"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <?php
                            $package_name = null;
//                            if(!empty($customer->package_id)){
                                $packages_count = \App\CustomerPackages::where([["customer_id",$customer->id],['status','active']])->count();

//                                if(!empty($package)){
//                                    $package_name = $package->ar_title;
//                                }


                            //}

                            ?>
                        <tr>
                            <td class="text-center">
                        {{ $customer->id }}
                    </td>
                    <td>
                        <div>{{ $customer->email }}</div>
                        <div class="small text-muted">
                             {{ $customer->first_name . ' ' . $customer->middel_name . ' ' . $customer->last_name  }}
                        </div>
                                <div class="small text-muted">
                                    {{ $customer->created_at }}
                                </div>
                            </td>
                            <td>
                                <div>
                                @if($customer->activity=="waitforpayment")
                                    لم يتم الدفع بعد
                                @elseif($customer->activity=="pending")

                                    بانتظار تاكيد الدفع
                                @else
                                    تم التسجيل
                                @endif
                                </div>
                            </td>
                            <td class="text-center">
                               {{ $packages_count }}
                            </td>
                            <td>
                                <div class="small text-muted">{{ $customer->country }}</div>
                                <div>{{ $customer->phone }}</div>
                            </td>
                            <td>
                                 <div >${{ $customer->balance }}</div>
                            </td>

                            {{--<div>--}}
                            {{--<a href="{{ url( '/adminpanel/customer/payments/' . $customer->id ) }}" class="btn btn-success btn-sm">--}}
                            {{--<i class="fa fa-landmark"></i> سجلات الدفع--}}
                            {{--</a>--}}
                            {{--<a href="{{ url( '/adminpanel/customer/edit/' . $customer->id ) }}" class="btn btn-warning btn-sm">--}}
                            {{--<i class="fa fa-user-edit"></i> تعديل--}}
                            {{--</a>--}}

                            {{--</div>--}}
                            {{--<div>--}}
                            {{--<a href="{{ url( '/adminpanel/customer/view/' . $customer->id ) }}" class="btn btn-info btn-sm">--}}
                            {{--<i class="fa fa-eye"></i> عرض--}}
                            {{--</a>--}}
                            {{--<a href="{{ url( '/adminpanel/customer/delete/' . $customer->id ) }}" class="btn btn-danger btn-sm confirm">--}}
                            {{--<i class="fas fa-trash"></i> حذف--}}
                            {{--</a>--}}

                            {{--</div>--}}


                            <td class="text-center">
                                <a  href="{{ url( '/adminpanel/customer/view/' . $customer->id ) }}" class="btn btn-primary btn-sm">التفاصيل</a>
                                <a href="{{ url( '/adminpanel/customer/edit/' . $customer->id ) }}"class="btn btn-indigo btn-sm">تعديل البيانات</a>
                                <a href="{{ url( '/adminpanel/customer/packages/' . $customer->id ) }}"class="btn btn-yellow btn-sm"> سجل الباقات</a>
                                <a href="{{ url( '/adminpanel/customer/payments/' . $customer->id ) }}"class="btn btn-outline-info btn-sm"> عمليات الدفع</a>
                                <a href="{{ url( '/adminpanel/customer/delete/' . $customer->id ) }}" class="confirm btn btn-red btn-sm">حذف</a>
                            </td>
                        </tr>@endforeach
                        </tbody>
                    </table>

                        {{ $customers->links() }}
                        @else
                        <div class="alert alert-warning">لا يوجد مستخذمين حاليا</div>
                    @endif
                </div>
            </div>
        </div>
		{{--<h2 class="heading-text-center"><i class="fa fa-users"></i> --}}
				{{--ادارة المستخدمين	--}}
		{{--</h2>--}}
		{{----}}
		{{--<div class="tbl_area">--}}
			{{--<div class="row">--}}
				{{--<div class="col-md-6">--}}
					{{--<div class="panel panel-default">--}}
						{{--<div class="panel-heading">--}}
							{{--العملاء المسجلين--}}
							{{--{{ $stats['cus_count'] }}--}}
						{{--</div>--}}
						{{----}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class="col-md-6">--}}
					{{--<div class="panel panel-default">--}}
						{{--<div class="panel-heading">--}}
							{{--العملاء المنتطرين التفعيل--}}
							{{--{{ $stats['pending_count'] }}--}}
						{{--</div>--}}
						{{----}}
					{{--</div>--}}
				{{--</div>--}}

			{{--</div>--}}
		{{--</div>--}}


        {{----}}

        {{--<div class="tbl_area">--}}
            {{--<form method="get">--}}
                {{--<div class="row">--}}

                    {{--<div class="col-md-6">--}}

                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control "--}}
                                   {{--placeholder="ابحث في قائمة العملاء"  value="{{ $search_text }}" name="search_keyword">--}}
                        {{--</div>--}}

                    {{--</div>--}}

                    {{--<div class="col-md-4">--}}
                            {{--<div class="form-group">--}}
                                {{--<select class="form-control" name="orderBy">--}}
                                    {{--<option>ترتيب .... حسب</option>--}}
                                    {{--<optgroup label="الارباح">--}}
                                        {{--<option>اكثر الاعضاء ارباح</option>--}}
                                        {{--<option>اقل الاعضاء ارباح</option>--}}
        {{----}}
                                    {{--</optgroup>--}}
                                    {{--<optgroup label="زمني">--}}
                                        {{--<option>المسجلين حديثا </option>--}}
                                        {{--<option>المسجلين اولا</option>--}}
                                    {{--</optgroup>--}}
        {{----}}
                                    {{--<optgroup label="الباقات">--}}
                                        {{--<option>الفضية</option>--}}
                                        {{--<option>الذهبية</option>--}}
        {{----}}
                                    {{--</optgroup>--}}
        {{----}}
                                {{--</select>--}}
                            {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<button class="btn btn-default btn-block" type="submit">--}}
                            {{--<i class="fa fa-search"></i> بحث--}}
                        {{--</button>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</form>--}}

            {{--@if(count($customers) > 0)--}}
                {{--<table class="table table-bordered text-center table-hover">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th> #</td>--}}
                        {{--<th> اسم المستخدم</th>--}}
                        {{--<th> البريد الاكتروني</th>--}}
                        {{--<th> الهاتف</th>--}}
                        {{--<th> الدولة</th>--}}
                        {{--<th> الباقة</th>--}}
                        {{--<th> الرصيد الحالي</th>--}}
                        {{--<th> الحالة</th>--}}
                        {{--<th> تاريخ التسجيل</th>--}}
                        {{--<th> ادارة</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($customers as $customer)--}}
                        {{--$package_name = null;--}}
                        {{--if(!empty($customer->package_id)){--}}
                            {{--$package = \App\Package::find($customer->package_id);--}}

                            {{--if(!empty($package)){--}}
                                {{--$package_name = $package->ar_title;--}}
                            {{--}--}}


                        {{--}--}}

                        {{--?>--}}
                        {{--<tr>--}}
                            {{--<td>{{ $customer->id }}</td>--}}
                            {{--<td>{{ $customer->first_name . ' ' . $customer->middel_name . ' ' . $customer->last_name  }}</td>--}}
                            {{--<td>{{ $customer->email }}</td>--}}
                            {{--<td>{{ $customer->phone }}</td>--}}
                            {{--<td>{{ $customer->country }}</td>--}}
                            {{--<td>--}}

                                {{--@if($package_name==null)--}}
                                    {{--لم يتم الاشتراك بعد--}}
                                {{--@else--}}

                                    {{--{{ $package_name }}--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>{{ $customer->balance }}$</td>--}}
                            {{--<td>--}}
                                {{--@if($customer->activity=="waitforpayment")--}}
                                    {{--لم يتم الدفع بعد--}}
                                {{--@elseif($customer->activity=="pending")--}}

                                    {{--بانتظار تاكيد الدفع--}}
                                {{--@else--}}
                                    {{--تم التسجيل--}}
                                {{--@endif--}}

                            {{--</td>--}}
                            {{--<td>{{ $customer->balance }}</td>--}}
                            {{--<td>--}}
                                {{--<div>--}}
                                    {{--<a href="{{ url( '/adminpanel/customer/payments/' . $customer->id ) }}" class="btn btn-success btn-sm">--}}
                                    {{--<i class="fa fa-landmark"></i> سجلات الدفع--}}
                                    {{--</a>--}}
                                    {{--<a href="{{ url( '/adminpanel/customer/edit/' . $customer->id ) }}" class="btn btn-warning btn-sm">--}}
                                        {{--<i class="fa fa-user-edit"></i> تعديل--}}
                                    {{--</a>--}}

                                {{--</div>--}}
                                {{--<div>--}}
                                    {{--<a href="{{ url( '/adminpanel/customer/view/' . $customer->id ) }}" class="btn btn-info btn-sm">--}}
                                        {{--<i class="fa fa-eye"></i> عرض--}}
                                    {{--</a>--}}
                                    {{--<a href="{{ url( '/adminpanel/customer/delete/' . $customer->id ) }}" class="btn btn-danger btn-sm confirm">--}}
                                        {{--<i class="fas fa-trash"></i> حذف--}}
                                    {{--</a>--}}

                                {{--</div>--}}
                            {{--</td>--}}

                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--@else--}}
                {{--<div class="alert alert-warning text-center"> {{ $empty_error_text }}</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{--<div class="text-center">--}}
            {{--{{ $customers->links() }}--}}
        {{--</div>--}}
	@endif

	
@endsection
