@extends("FrontEnd.Layout.Panel.master")

@section("content")
	<div class="payments_history">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Paymetns History </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                    @if(!empty($payments_history))
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    {{--<th class="text-center">Gateway</th>--}}
                                                    <th class="text-center">Transaction ID</th>
                                                    <th class="text-center">Gateway</th>
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Value</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($payments_history as $payment)
                                                <tr>
                                                    <td class="text-center">{{ $payment['id'] }}</td>
                                                    {{--<td class="text-center">{{ $payment['id'] }}</td>--}}
                                                    <td class="text-center">{{ $payment['refrance'] }}</td>
                                                    <td class="text-center">{{ $payment['gateway'] }}</td>
                                                    <td class="text-center">{{ $payment['payment_type'] }}</td>
                                                    <td class="text-center">{{ $payment['payment_value'] }}$</td>
                                                    <td class="text-center">{{ $payment['updated_at'] }}</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-complete">{{ $payment["status"] }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else 
                                            <div class="alert alert-warning text-center">there is no any payment yet</div>
                                        @endif
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    </div>
                </div>

@endsection
