@extends("FrontEnd.Layout.Panel.master")

@section("content")
    <div class="payments_history">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">My Current Packages Plan </h4>
                        <a href="{{ url("addnewplan") }}" class="btn btn-primary btn-sm">Add New Plan</a>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            @if(!empty($packages))
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Package</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Start at</th>
                                        <th class="text-center">End At</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($packages as $package3)
                                        <?php


//                                        $sumiation = $sumiation + $profit->profit;
                                        $package = \App\Package::find($package3->package_id);
                                        $start_at = date("Y-m-d",strtotime($package3->activited_at)) ;
                                        $date = strtotime("+$package->expire_after day", strtotime($package3->activited_at));

                                        ?>
                                        <tr>
                                            <td class="text-center">{{ $package3->id }}</td>
                                            <td class="text-center"> {{ $package->en_title }} </td>
                                            <td class="text-center"> {{ $package3->quantity }} </td>
                                            <td class="text-center"> {{ $package->price }}</td>
                                            <td class="text-center"> {{ $package3->status }}</td>
                                            <td class="text-center"> {{ $start_at }}</td>
                                            <td class="text-center"> {{  date("Y-m-d",$date) }}</td>



                                        </tr>
                                    @endforeach



                                    </tbody>
                                </table>
                                <div class="text-center">{{ $packages->links() }}</div>
                            @endif
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->

        </div>
    </div>

@endsection
