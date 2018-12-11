@extends("BackEnd.Layout.Dashboard.app")


@section("content")
    <h3 class="header text-center">الباقات  <a  class="btn btn-blue btn-sm " href="{{ url("adminpanel/addpackage") }}"><i class=" fa fa-plus"></i> انشاء باقة</a> </h3>
    <?php

    if(!empty($packages)){
        foreach( array_chunk($packages, 4) as $packags){

            ?>
            <div class="row row-cards">
                <?php foreach($packags as $package){
                    ?>



                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-center">
                            <div class="card-status bg-green"></div>
                            <div class="card-body text-center">
                                <div class="card-category"><span class="pull-left">@if(!$package['has_today_profit'])
                                            <a
                                                href="{{ url("adminpanel/package/profit/".$package['id']) }}"
                                                class="btn btn-warning btn-sm" data-id="{{ $package['id'] }}" data-title="{{ $package['ar_title'] }}" data-price="{{ $package['price'] }}">
 										 <i class="fa fa-plus"></i>  </a>
                                        @else
                                            <?php
                                            $profit = $package['today_profit'];
                                            if($profit->type=="1"){
                                                $mode = "$";
                                            }else{
                                                $mode = "$";
                                            }
                                            echo "<button class='btn btn-green'>".$mode . $profit->profit."</button>";
                                            ?>
                                        @endif</span> {{ $package['ar_title'] }}</div>
                                <div class="display-3 my-4">${{ $package['price'] }}</div>
                                <ul class="list-unstyled leading-loose">
                                    <li>{{ $package['ar_note'] }}   </li>
                                    <li><strong>{{ $package['expire_after'] }} </strong> يوم </li>


                                </ul>
                                <div class="text-center mt-6">
                                    <div class="margin_tb_15">
                                        @if($package['status']=="active")
                                            <a href="{{url('/adminpanel/package/block/'.
										$package['id'] ) }}" class="confirm btn btn-facebook btn-block text-center">اغلاق</a>
                                            @else

                                            <a href="{{url('/adminpanel/package/active/'.
										$package['id'] ) }}" class="confirm btn btn-youtube btn-block text-center">تفعيل</a>
                                            @endif


                                    </div>
                                    <br/>
                                    <div class="margin_tb_15">
                                        <a href="{{url('/adminpanel/package/delete/'.
										$package['id'] ) }}" class="confirm btn btn-red">حذف</a>
                                        <a href="{{ url('adminpanel/package/edit/' . $package['id']) }}" class="btn btn-info">تعديل</a>
                                        <a href="{{ url('adminpanel/package/features/' . $package['id']) }}" class="btn btn-blue">مميزات</a>
                                        <a href="{{ url('adminpanel/package/profit/' . $package['id']) }}" class="btn btn-green">الارباح</a>

                                    </div>
                                     </div>
                            </div>
                        </div>
                    </div>


                    <?php } ?>

            </div>



            <?php
        }
        }

    ?>




            {{--<div class="text-center mar-bottm15">--}}
                {{--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">انشاء باقة  جديدة</button>--}}
            {{--</div>--}}
            {{----}}
                {{----}}
            {{--@if ($errors->any())--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<ul>--}}
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li class="error">{{ $error }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}


                    {{--if(!empty($packages)){--}}
                    {{--foreach( array_chunk($packages, 3) as $packags){--}}
                        {{--echo '<div class=\'row\'>';--}}
                            {{--foreach($packags as $package){--}}
                                {{--?>--}}

                            {{--<div class="col-md-4 package">--}}
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading">--}}
                                        {{--<div class="btm_border">--}}
                                        {{--{{ $package['ar_title'] }}--}}
                                            {{--<span class="pull-left price green">{{ $package['price'] }}$</span>--}}
                                        {{----}}
                                        {{--</div>--}}
                                        {{--<div class="ltr">{{ $package['en_title'] }}</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="panel-body">--}}
                                        {{--<div class="btm_border">{{ $package['ar_note'] }}</div>--}}
                                        {{--<div  class="ltr">{{ $package['en_note'] }}</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="panel-footer">--}}
										{{--<div class="form-group">--}}
                                        {{--<a href="{{ url('adminpanel/package/edit/' . $package['id']) }}"--}}
										 {{--class="btn btn-primary btn-sm">--}}
										 {{--<i class="fa fa-edit"></i> تعديل </a>--}}
                                        {{--<a href="{{ url('view_package/' . $package['id']) }}"--}}
										 {{--class="btn btn-info btn-sm">--}}
										 {{--<i class="fa fa-info-circle"></i> التفاصيل </a>--}}
										 {{--@if(!$package['has_today_profit'])--}}
 										{{--<a --}}
 										{{--href="#" --}}
 										 {{--class="addDailyProfitButtonInPackesIndexView--}}
										 	 {{--btn btn-success btn-sm" data-id="{{ $package['id'] }}" data-title="{{ $package['ar_title'] }}" data-price="{{ $package['price'] }}">--}}
 										 {{--<i class="fa fa-plus"></i>  ارباح اليوم </a>--}}
										 {{--@else--}}
												{{--$profit = $package['today_profit'];--}}
												{{--if($profit->type=="1"){--}}
													{{--$mode = "%";--}}
												{{--}else{--}}
													{{--$mode = "$";--}}
												{{--}--}}
													{{--echo "<button --}}
															{{--class=\"btn btn-default--}}
														 {{--btn-sm\">--}}
														 	{{--ارباح اليوم --}}
															{{--".$profit->profit. $mode.  --}}
															{{--"</button>";--}}
											{{--?>--}}
										 {{--@endif--}}
									{{--</div>--}}
									{{--<div class="form-group">--}}
										{{----}}
                                        {{--<a --}}
										{{--href="{{ url('adminpanel/package/features/' . $package['id']) }}"--}}
										 {{--class="btn btn-warning btn-sm">--}}
										 {{--<i class="fa fa-bars"></i> المميزات </a>--}}
                                        {{--<a href="{{url('/adminpanel/package/delete/'.--}}
										{{--$package['id'] ) }}" --}}
										 {{--class="btn btn-danger btn-sm confirm">--}}
										 {{--<i class="fas fa-remove"></i> حذف </a>--}}
									{{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--}--}}

                        {{--echo '</div>';--}}
                    {{--}--}}
                    {{--}else{--}}

                        {{--strtotime()--}}
                        {{--?>--}}
                            {{--<div class="alert alert-warning text-center">لا توجد باقات حاليا بالموقع</div>--}}

                    {{--}   --}}
                    {{--?>--}}

           {{----}}




@endsection
