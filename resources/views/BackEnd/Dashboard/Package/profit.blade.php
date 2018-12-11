
<?php
$today = \App\DateHelper::returnToday();

?>

@extends("BackEnd.Layout.Dashboard.app")

<style>
    .addproitarea
    {
        display: none;
        margin-bottom: 20px;
    }
</style>

@section("content")
    <div class="col-12">
        <div class="card">

            <div class="addproitarea" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" id="closeaddprofitarea" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i>
                                تاريخ اليوم {{ $today }}  </h4>
                        </div>
                        <form method="post" action="{{ url('adminpanel/package/add_daily_profit') }}">
                            @csrf
                            <input type="hidden" value="{{ $package->id }}" id="package_id" name="package_id">
                            <input type="hidden" value="{{ $today }}"  name="day">
                            <div class="modal-body">

                                <div class="form-group">
                                    <input type="text" name="title" id="package_title" value="الباقة {{ $package->ar_title }}"
                                           placeholder="العنوان " class="form-control" disabled/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="title" id="package_title" value="قيمة الباقة  {{ $package->price }}"
                                           placeholder="العنوان " class="form-control" disabled/>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="mode" id="profit_mode">
                                        <option value="1">نسبة</option>
                                        <option value="2">قيمة</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" min="0" max="100" name="value" id="profit_value"
                                           placeholder=" بالنسبة المئوية من قيمة الاشتراك او بالقيمة مباشرة  " class="form-control" required/>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary confirm">تطبيق الارباح </button>

                            </div>
                        </form>
                    </div>


            </div>

            @if(!empty($last_profit))
                @if(intval(strtotime($last_profit->daily_date))!=intval(strtotime($today)))
                    <div class="">
                        <a href="javascript:void(0)" class="btn btn-success addprofitbtn"><i class="fe fe-plus"></i> Add Profit</a>
                    </div>

                    @else

                    <div class="">
                        <button class="btn-blue">تمت اضافة ارباح  اليوم</button>
                    </div>
                    @endif
                @else

                <div class="">
                    <a href="javascript:void(0)" class="btn btn-success addprofitbtn"><i class="fe fe-plus"></i> اضافة ارباح اليوم</a>
                </div>
                @endif

            <div class="table-responsive">
                @if(!empty($profits))

                <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                    <thead>
                    <tr>
                        <th class="text-center w-1"><i class="icon-people"></i></th>
                        <th>الباقة | تاريخ اليوم</th>
                        <th>نسبة الربح</th>
                        <th>قيمة الربح</th>
                        <th class="text-center">عدد المستفيدين</th>
                        <th class="text-center"><i class="icon-settings"></i></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($profits as $profit)
                        <?php
                            $color = "green";
                            $persent = ($profit['profit']/$package->price) * 100;
                            if($persent<=10){
                                $color = "red";
                            }elseif($persent>10 and $persent<=50){
                                $color = "yellow";
                            }
                            elseif($persent>50 and $persent<85){
                                $color = "orange";
                            }
                            elseif($persent>=85){
                                $color = "green";
                            }
                        ?>
                    <tr>
                        <td class="text-center">

                        </td>
                        <td>
                            <div>{{ $package->ar_title }}</div>
                            <div class="small text-muted">
                                {{ $profit['daily_date'] }}
                            </div>
                        </td>
                        <td>
                            <div class="clearfix">
                                <div class="float-left">
                                    <strong>{{ $persent }}%</strong>
                                </div>
                                <div class="float-right">
                                    <small class="text-muted">{{ $profit['created_at'] }}</small>
                                </div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-{{$color}}" role="progressbar" style="width: {{ $persent }}%" aria-valuenow="{{ $persent }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>

                        <td>
                            <div class="">{{ $profit['profit'] }}$</div>
                        </td>
                        <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="1" data-thickness="3" data-color="blue"><canvas width="80" height="80" style="height: 80px; width: 80px;"></canvas>
                                <div class="chart-circle-value">{{ $profit['customers'] }} مستخدم </div>
                            </div>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>

                    @endif
            </div>
        </div>
    </div>
@endsection
