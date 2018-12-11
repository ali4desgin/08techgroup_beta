@extends("BackEnd.Layout.Dashboard.app")


@section("content")
	<h1 class="heading-text-center">الاشعارات</h1>
	<div class="row">
		<!-- <div class="col-md-4">
			<div class="jumbotron">
			  	<div clas="">
			  	  	<h5 class="heading-text-center"><i class="fa fa-bell"></i> الاشعارات الاخيرة</h5>
					<ul class="list-group">
					     <li class="list-group-item">عملية دفع</li>
					     <li class="list-group-item">اشعار طلب سحب</li>
					     <li class="list-group-item">رسالة من مستخدم</li>

					</ul>
			  	</div>
			</div>
		</div> -->
		
		<div class="col-md-12">
			<ul class="list-group">
				@if(!empty($nofitications))
					
					@foreach($nofitications as $nofitication)
						<div class="row">
			     			<div class="form-group">
								<li class="list-group-item 
								@if($nofitication['viewed']=='0')
									alert alert-danger
								@endif
								">{{ $nofitication['content'] }}
								@if($nofitication['viewed']=='0')
									<a 
									href="{{ url('adminpanel/notificationreaded/'.$nofitication['id']) }}"
									class="pull-left btn btn-info
									 btn-sm" style="padding: 1px 5px;">جعله مقرؤ</a>
								@endif
								
							</li>
							</div>
						</div>
				 	@endforeach
					
					
					<div class="text-center">
						{{ $nofitications->links() }}
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
