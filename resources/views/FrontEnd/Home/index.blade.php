<?php
$header_link = url("public/json/header.json");
$footer_link = url("public/json/footer.json");
$header_json = json_decode(file_get_contents($header_link),true);
$footer_json = json_decode(file_get_contents($footer_link),true);
?>
@extends("FrontEnd.Layout.master")

@section("content")


<section class="engine"><a href="https://mobirise.info/x">css templates</a></section><section class="header8 cid-r9hgk6gCaj mbr-fullscreen mbr-parallax-background" id="header8-i">



    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);">
    </div>

    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center py-2 mbr-bold mbr-fonts-style display-1">
                        {{ $header_json['en_title'] }}
                </h1>
                <p class="mbr-text align-center py-2 mbr-fonts-style display-5">
                        {{ $header_json['en_description'] }}
                </p>
                <!-- <div class="mbr-media show-modal align-center py-2" data-modal=".modalWindow">
                         <span class="mbri-play mbr-iconfont"></span>
                </div> -->
                <!-- <div class="icon-description align-center font-italic pb-3 mbr-fonts-style display-7">
                        Icon's descriptions
                </div> -->
                <div class="mbr-section-btn text-center">
                     <a class="btn btn-md btn-secondary display-4" href="{{ url('about' )}}">MORE</a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="modalWindow" style="display: none;">
            <div class="modalWindow-container">
                <div class="modalWindow-video-container">
                    <div class="modalWindow-video">
                        <iframe width="100%" height="100%" frameborder="0" allowfullscreen="1" data-src="http://www.youtube.com/watch?v=uNCr7NdOJgw"></iframe>
                    </div>
                    <a class="close" role="button" data-dismiss="modal">
                        <span aria-hidden="true" class="mbri-close mbr-iconfont closeModal"></span>
                        <span class="sr-only">Close</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article content9 cid-r9hf6aMvAx" id="content9-c">



    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5">
                    {{ $header_json['en_description'] }}
                </div>
            <hr class="line" style="width: 25%;">
        </div>
        </div>
</section>

<section class="cid-r9heLGC5TG" id="pricing-tables1-8">



    <div class="container">
        @if(!empty($packages))
        <div class="row">





				@foreach($packages as $package)
				<?php

				$features = \App\PackageFeatures::where('package_id',$package['id'])->get();


				?>

			            <div class="plan  col-lg-3 ">
			                <div class="plan-header text-center pt-5">
			                    <h3 class="plan-title mbr-fonts-style display-5">
			                        {{ $package['ar_title'] }}
			                    </h3>
			                    <div class="plan-price">
			                        <span class="price-value mbr-fonts-style display-5">
			                            $
			                        </span>
			                        <span class="price-figure mbr-fonts-style display-1">
			                              {{ $package['price'] }}</span>
			                        <!-- <small class="price-term mbr-fonts-style display-7">
			                            per month
			                        </small> -->
			                    </div>
			                </div>
			                <div class="plan-body pb-5">
			                    <div class="plan-list align-center">
			                        <ul class="list-group list-group-flush mbr-fonts-style display-7">


									  @foreach($features as $feature)
			                            <li class="list-group-item">
			                                {{ $feature['en_feature'] }}
			                            </li>
										@endforeach
			                        </ul>
			                    </div>
			                    <div class="mbr-section-btn text-center pt-4">
			                        <a href="{{ url('register?package='.$package['id']  ) }}" class="btn btn-primary display-4">JOIN NOW</a>
			                    </div>
			                </div>
			            </div>


				@endforeach


    @endif
		</div>
    </div>
</section>

<section class="progress-bars3 cid-r9hf1gfLe9" id="progress-bars3-b">




    {{--<section class="progress-bars3 cid-rbb1Bxz5Lx" id="progress-bars3-p">--}}





        {{--<div class="container">--}}
            {{--<h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">--}}
                {{--Activities--}}
            {{--</h2>--}}

            {{--<h3 class="mbr-section-subtitle mbr-fonts-style display-5">--}}
                {{--Mobirise has provided for website developers a growing library of modern blocks which can be used either partially or in full for every website developed through the builder.--}}
            {{--</h3>--}}

            {{--<div class="media-container-row pt-5 mt-2">--}}
                {{--<div class="card p-3 align-center">--}}
                    {{--<div class="wrap">--}}
                        {{--<div class="pie_progress progress1" role="progressbar" data-goal="50" aria-valuenow="50">--}}
                            {{--<p class="pie_progress__number mbr-fonts-style display-5">50%</p>--}}
                            {{--<div class="undefined"><svg version="1.1" preserveAspectRatio="xMinYMin meet" viewBox="0 0 150 150"><ellipse rx="71" ry="71" cx="75" cy="75" stroke="#f2f2f2" fill="none" stroke-width="8"></ellipse><path fill="none" stroke-width="8" stroke="url(#progress-bars3-p-svg-gradient)" d="M75,4 A71,71 0 0 1 75.00000000000001,146" style="stroke-dasharray: 223.084, 223.084; stroke-dashoffset: 0;"></path></svg></div></div>--}}
                    {{--</div>--}}
                    {{--<div class="mbr-crt-title pt-3">--}}
                        {{--<h4 class="card-title py-2 mbr-fonts-style display-5">--}}
                            {{--Amenity--}}
                        {{--</h4>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="card p-3 align-center">--}}
                    {{--<div class="wrap">--}}
                        {{--<div class="pie_progress progress2" role="progressbar" data-goal="60" aria-valuenow="60">--}}
                            {{--<p class="pie_progress__number mbr-fonts-style display-5">60%</p>--}}
                            {{--<div class="undefined"><svg version="1.1" preserveAspectRatio="xMinYMin meet" viewBox="0 0 150 150"><ellipse rx="71" ry="71" cx="75" cy="75" stroke="#f2f2f2" fill="none" stroke-width="8"></ellipse><path fill="none" stroke-width="8" stroke="url(#progress-bars3-p-svg-gradient)" d="M75,4 A71,71 0 1 1 33.26724708723444,132.4402066006213" style="stroke-dasharray: 267.674, 267.674; stroke-dashoffset: 0;"></path></svg></div></div>--}}
                    {{--</div>--}}
                    {{--<div class="mbr-crt-title pt-3">--}}
                        {{--<h4 class="card-title py-2 mbr-fonts-style display-5">--}}
                            {{--Publick transport--}}
                        {{--</h4>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="card p-3 align-center">--}}
                    {{--<div class="wrap">--}}
                        {{--<div class="pie_progress progress3" role="progressbar" data-goal="70" aria-valuenow="70">--}}
                            {{--<p class="pie_progress__number mbr-fonts-style display-5">70%</p>--}}
                            {{--<div class="undefined"><svg version="1.1" preserveAspectRatio="xMinYMin meet" viewBox="0 0 150 150"><ellipse rx="71" ry="71" cx="75" cy="75" stroke="#f2f2f2" fill="none" stroke-width="8"></ellipse><path fill="none" stroke-width="8" stroke="url(#progress-bars3-p-svg-gradient)" d="M75,4 A71,71 0 1 1 7.474987343044106,96.94020660062128" style="stroke-dasharray: 312.303, 312.303; stroke-dashoffset: 0;"></path></svg></div></div>--}}
                    {{--</div>--}}
                    {{--<div class="mbr-crt-title pt-3">--}}
                        {{--<h4 class="card-title py-2 mbr-fonts-style display-5">--}}
                            {{--Nightlife--}}
                        {{--</h4>--}}
                    {{--</div>--}}
                {{--</div>--}}






            {{--</div>--}}
        {{--</div>--}}{{--</section>--}}






<section class="features1 cid-rbb1uBKkyR" id="features1-n">




        <div class="container">
            <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
                Statistics
            </h2>
            <div class="media-container-row">

                <div class="card p-3 col-12 col-md-4 col-lg-3">

                    <div class="card-img pb-3">
                        <span class="mbri-user mbr-iconfont"></span>
                    </div>
                    <div class="card-text">
                        <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">{{ ceil($customers) }}</h3>
                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                            user
                        </h4>

                    </div>
                </div>

                <div class="card p-3 col-12 col-md-4 col-lg-3">

                    <div class="card-img pb-3">
                        <span class="mbri-cash mbr-iconfont"></span>
                    </div>
                    <div class="card-text">
                        <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">{{ ceil($payments_added) }}</h3>
                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                            Total Deposit
                        </h4>

                    </div>
                </div>


                <div class="card p-3 col-12 col-md-4 col-lg-3">

                    <div class="card-img pb-3">
                        <span class="mbri-cash mbr-iconfont"></span>
                    </div>
                    <div class="card-text">
                        <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">{{ ceil($profis_count) }}</h3>
                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                            Total profit
                        </h4>

                    </div>
                </div>





                <div class="card p-3 col-12 col-md-4 col-lg-3">

                    <div class="card-img pb-3">
                        <span class="mbri-cash mbr-iconfont"></span>
                    </div>
                    <div class="card-text">
                        <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">{{ ceil($payments_sended) }}</h3>
                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                            Total Withdown
                        </h4>

                    </div>
                </div>



            </div>

        </div>

    </section>





    <section class="daliyprofit">
    <div class="container">
        <div class="media-container-row align-center">
            <div class="col-12 col-md-12">
                <h2 class="mbr-section-title mbr-fonts-style mbr-black pb-3 display-2">Last 6 Packages Daily Profit</h2>

                <div class="table-wrapper">
                    <div class="container scroll">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr class="table-heads">
                                <th class="head-item mbr-fonts-style display-5">#</th><th class="head-item mbr-fonts-style display-5">Package</th><th class="head-item mbr-fonts-style display-5">Price</th><th class="head-item mbr-fonts-style display-5">Profit</th><th class="head-item mbr-fonts-style display-5">%</th><th class="head-item mbr-fonts-style display-5">Date</th></tr>
                            </thead>

                            <tbody>








            @if(!empty($profits))
                    @foreach($profits as $profit)
                    <?php
                    $package = \App\Package::find($profit['package_id']);


                    ?>
                    @if(!empty($package))
                    <tr><td class="body-item mbr-fonts-style display-7">{{ $profit['id'] }}</td><td class="body-item mbr-fonts-style display-7">{{ $package->en_title }}</td><td class="body-item mbr-fonts-style display-7">{{ $package->price }}$</td><td class="body-item mbr-fonts-style display-7">{{ $profit['profit'] }}$</td><td class="body-item mbr-fonts-style display-7">
                            <?php

                            $persent = round( ($profit['profit'] / $package->price ) * 100,2);
                            echo  $persent;
                            ?>

                            @endif

                        </td><td class="body-item mbr-fonts-style display-7">{{ $profit['daily_date'] }}</td></tr><tr>
                    @endforeach
            @endif

</tbody>


                        </table>


                    </div>
                </div>
                {{--<p class="pt-4 mbr-fonts-style mbr-text align-center display-7">Encroll now </p>--}}
            </div>
        </div>
    </div>
</section>





    <section class="mbr-section form1 cid-rbb1EejLQq" id="form1-r">




        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        CONTACT US
                    </h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                        Keep in touch
                    </h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                    </div>

                    <form class="mbr-form" action="{{ url("sendmail") }}" method="post" data-form-title="Mobirise Form">
                        @csrf
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-r">Name</label>
                                    <input type="text" class="form-control" name="name" data-form-field="Name" required="" id="name-form1-r">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email-form1-r">Email</label>
                                    <input type="email" class="form-control" name="email" data-form-field="Email" required="" id="email-form1-r">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="phone">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-r">Phone</label>
                                    <input type="tel" class="form-control" name="phone" data-form-field="Phone" id="phone-form1-r">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" data-for="message">
                            <label class="form-control-label mbr-fonts-style display-7" for="message-form1-r">Message</label>
                            <textarea type="text" class="form-control" name="message" rows="7" data-form-field="Message" id="message-form1-r"></textarea>
                        </div>

                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4">SEND FORM</button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
