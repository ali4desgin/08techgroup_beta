@extends("BackEnd.Layout.Dashboard.app")

@section("content")
	<h1 class="heading-text-center">تفاصيل المستخدم</h1>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<i class="fa fa-info-circle"></i>
						البيانات الاساسية
				</div>
				<div class="panel-body">
					<p>{{ $customer->first_name }} - {{ $customer->middel_name }} - {{ $customer->last_name }}</p>
					<p>{{ $customer->email }}</p>
					<p>{{ $customer->country }}</p>
					<p>{{ $customer->phone }}</p>
					<p>
						
						@if($customer->gender == "male")
							ذكر
						@else
						
					انثى	
						@endif
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					بيانات الارباح
				</div>
				<div class="panel-body">
				</div>
				
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					{{ $customer->email }}
				</div>
				<div class="panel-body">
					
				</div>
			</div>
		</div>
	</div>
@endsection
