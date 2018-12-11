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

        <div class="col-md-12">
            <ul class="list-group">
                @if(!empty($packages))



                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">  الباقات </h3>
                            </div>
                            <div class="table-responsive">

                                <table class="table card-table table-vcenter text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="w-1">#</th>
                                        <th>المستخدم</th>
                                        <th>الباقة</th>
                                        <th>العدد </th>
                                        <th>تاريخ الاشتراك</th>
                                        <th>تاريخ الانتهاء</th>
                                        <th>ادارة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($packages as $package)
                                        <?php

                                        $package_d = \App\Package::find($package->package_id);
                                        $start_at = date("Y-m-d",strtotime($package->activited_at)) ;
                                        $date = strtotime("+$package_d->expire_after day", strtotime($package->activited_at));
                                       // $customer = \App\Customer::find($package->customer_id);
                                        //                            $customer = \App\Customer::find($payment->customer_id);
                                        ?>
                                        <tr>
                                            <td><span class="text-muted">{{ $package->id }}</span></td>
                                            <td><a href="{{ url( '/adminpanel/customer/view/' . $customer->id ) }}" class="text-inherit">{{ $customer->email }}</a></td>
                                            <td><span class="text-muted">{{ $package_d->ar_title }}</span></td>
                                            <td><span class="text-muted">{{ $package->quantity }}</span></td>
                                            <td><span class="text-muted">{{ $start_at }}</span></td>
                                            <td><span class="text-muted">{{ date("Y-m-d",$date)}}</span></td>
                                            <td><span class="text-muted"><a href="{{ url("adminpanel/packagehistory/".$package->id) }}" class="btn btn-blue btn-sm">تغير الحالة</a> </span></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>                </div>
                        </div>
                    </div>



                    <div class="text-center">
                        {{ $packages->links() }}
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
