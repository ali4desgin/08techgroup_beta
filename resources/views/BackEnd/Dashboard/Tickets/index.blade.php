@extends("BackEnd.Layout.Dashboard.app")


@section("content")

    <div class="col-lg-12">
        <div class="card">
            @if(!empty($tickets))
            <table class="table card-table table-vcenter">
                <tbody>
                @foreach($tickets as $ticket)
                    <?php

                        $customer = \App\Customer::find($ticket['customer_id']);
                    ?>
                <tr>
                    <td>{{ $ticket['id'] }}</td>
                    {{--<td><span class="btn btn-green btn-sm text-white">red</span></td>--}}
                    <td>
                        <a href="{{ url("adminpanel/ticket/".$ticket['id']) }}">{{ $ticket['title'] }}</a>
                    </td>
                    <td class="text-right text-muted d-none d-md-table-cell text-nowrap">{{ $ticket['created_at'] }}</td>
                    <td class="text-right text-muted d-none d-md-table-cell text-nowrap">
                        <a href="{{ url("adminpanel/customer/view/".$customer['id']) }}">{{ $customer['email'] }}</a>

                    </td>
                    <td class="text-right">

                       <?php
                        if($ticket['status']=="new"){
                            ?>
                           <span class="btn btn-green btn-sm text-white">جديدة </span>
                            <?php
                        }else if($ticket['status']=="adminreplay"){
                           ?>
                           <span class="btn btn-gray btn-sm text-white">بانتظارالرد</span>
                           <?php
                           }else if($ticket['status']=="userreplay"){
                           ?>
                           <span class="btn btn-orange btn-sm text-white">المستخدم رد</span>
                           <?php
                           }else{

                           ?>
                           <span class="btn btn-gray btn-sm text-white">تم الاغلاق</span>
                           <?php
                           }

                       ?>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else

            @endif
        </div>
    </div>
@endsection
