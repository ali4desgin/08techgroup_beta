@extends("BackEnd.Layout.Dashboard.master")

@section("content")
	<h1 class="heading-text-center"><i class="fab fa-accusoft"></i> المعلينين</h1>

	<div class="row">
	    <!-- <h4 class="list-group-item-heading">List group item heading</h4> -->
	    @foreach($advertisers as $advertiser)
		    <div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bars"></i> {{ $advertiser['website_title'] }}
					</div>
					<div class="panel-body">
						<p> <a href=""><i class="fa fa-user"></i> علي عبدالله عبدالله</a></p>
						<p><a href=""><i class="fa fa-cubes"></i> الباقة الفضية</a></p>
						<p><a href="{{ $advertiser['website_url'] }}" target="_blank"><i class="fa fa-link"></i> رابط الموقع</a></p>
						<p>
							
							<img src="{{ $advertiser['website_logo'] }}" class="img-responsive center-block" style="height:60px;">
						</p>
					</div>
					<div class="panel-footer">
						<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
						<a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
						<a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
					</div>
				</div>
			</div>
		
		@endforeach
	  
	</div>
@endsection