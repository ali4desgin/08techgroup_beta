@extends("BackEnd.Layout.Dashboard.master")


@section("content")

	@if($payment_id == 1)
		<h1 class="heading-text-center"> <i class="fab fa-paypal"></i> تعديل بيانات بوابة الباي بال </h1>
		
		<form method="post">
			@csrf
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<input type="email" value="{{ $gateway['email'] }}" class="form-control input-lg" placeholder="بريد حساب الباي بال" required name="email">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<button class="btn btn-primary btn-block btn-lg">حفظ</button>
					</div>
				</div>
			</div>
			
		</form>
	@endif

@endsection