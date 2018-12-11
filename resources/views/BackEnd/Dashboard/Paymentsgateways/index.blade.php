@extends("BackEnd.Layout.Dashboard.app")


@section("content")
<h1 class="heading-text-center"> <i class="fa fa-door-open"></i> بوبات الدفع</h1>
<form method="post">
@csrf
<div class="list-group">
  <div class="list-group-item">
	<div class="row">
		
		<div class="">
			<div class="col-md-6">
				<span class="lead"><i class="fab fa-paypal"></i> PayPal</span>
			</div>
			<div class="col-md-1 col-md-offset-5 text-center">
				<input type="checkbox" 
				@if($gateway["PayPal"])
				checked
				@endif
				
				 data-toggle="toggle" name="PayPal">
				
			</div>
		</div>
	</div>
	
  </div>
  <div class="list-group-item">
	<div class="row">
		
		<div class="">
			<div class="col-md-6">
				<span class="lead"><i class="fab fa-cc-mastercard"></i> Visa/Master</span>
			</div>
			<div class="col-md-1 col-md-offset-5 text-center">
				<input type="checkbox"  
				@if($gateway["Master"])
				checked
				@endif
				 data-toggle="toggle" name="Master">
				
			</div>
		</div>
	</div>
	
  </div>
  <div class="list-group-item">
	<div class="row">
		
		<div class="">
			<div class="col-md-6">
				<span class="lead"><i class="fa fa-university"></i> Mbok</span>
			</div>
			<div class="col-md-1 col-md-offset-5 text-center">
				<input type="checkbox" 
				@if($gateway["Mbok"])
				checked
				@endif data-toggle="toggle" name="Mbok">
				
			</div>
		</div>
	</div>
	
  </div>
  <div class="list-group-item">
	<div class="row">
		
		<div class="">
			<div class="col-md-6">
				<span class="lead" ><i class="fab fa-bitcoin"></i> Blockchain Wallet</span>
			</div>
			<div class="col-md-1 col-md-offset-5 text-center">
				<input type="checkbox" 
				@if($gateway["BlockChain"])
				checked
				@endif
				 data-toggle="toggle" name="BlockChain">
				
			</div>
		</div>
	</div>
	
  </div>
  <div class="list-group-item">
	<div class="row">
		
		<div class="text-center">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary btn-block btn-lg">حفظ</button>
			</div>
			
		</div>
	</div>
	
  </div>
</div>
</form>
@endsection
