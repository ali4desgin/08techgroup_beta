@extends("FrontEnd.Layout.Panel.master")

@section("content")
    <div class="payments_history">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Last 7 days Profit </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            @if(!empty($paginatedItems))
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">Day</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Profit</th>
                                    <th class="text-center">Package</th>
                                </tr>
                                </thead>
                                <tbody>



                               
                                    <?php $sumiation = 0; 
                                        $day = 1;
                                    ?>
                                     @foreach($paginatedItems as $profit)
                                     <?php 
                                        
                                        $sumiation = $sumiation + $profit->profit;
                                        $package = \App\Package::find($profit->package_id);
                                     ?>
                                         <tr>
                                             <td class="text-center">{{ $day }}</td>
                                             <td class="text-center"> {{ $profit->daily_date }} </td>
                                             <td class="text-center"> {{ $profit->profit }}$</td>
                                             <td class="text-center"> {{ $package->en_title }} </td>
                                             
                                             
                                         </tr>
                                         <?php $day++ ;?>
                                     @endforeach
                                    
                                     <tr class="alert alert-success">
                                             <td class="text-center"></td>
                                             <td class="text-center"> count </td>
                                             <td class="text-center"> {{$sumiation }}$ </td>
                                             <td class="text-center">  </td>
                                             
                                             
                                         </tr>
                                   
                                </tbody>
                            </table>
                            <div class="text-center">{{ $paginatedItems->links() }}</div>
                            @endif
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->

        </div>
    </div>

@endsection
