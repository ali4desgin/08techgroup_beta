<?php
$header_link = url("public/json/header.json");
$footer_link = url("public/json/footer.json");
$settings_link = url("public/json/settings.json");
$header_json = json_decode(file_get_contents($header_link),true);
$footer_json = json_decode(file_get_contents($footer_link),true);
$settings_json= json_decode(file_get_contents($settings_link),true);

?>
@extends("FrontEnd.Layout.master")



@section("content")


    @if($settings_json['register']=="on")

<div class="container">
 
 	<h1 class="heading-title">Join us now <span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span></h1>
 
 

 
  <!-- Content here -->
  <form action="" method="post">
	  @csrf
	 <div class="row">
	     <div class="col-md">
		    <div class="form-group">
  			  
		      <label for="fname">First name: @if ($errors->has('first_name')) 
	<span class="danger_color ">{{  $errors->first('first_name') }}</span> 
  @endif</label>
		      <input type="text" class="form-control
  			  @if ($errors->has('first_name')) 
			    border border-danger  
  			  @endif
			  
			  " id="fname" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required>
		    </div> 
		 </div>
	     <div class="col-md">
		    <div class="form-group">
		      <label for="mname">Middel name: @if ($errors->has('middel_name')) 
	<span class="danger_color ">{{  $errors->first('middel_name') }}</span> 
  @endif</label>
		      <input type="text" class="form-control
  			  @if ($errors->has('middel_name')) 
			    border border-danger  
  			  @endif
			  " id="mname" name="middel_name" value="{{ old('middel_name') }}" placeholder="Middel name">
		    </div> 
		 </div>
	     <div class="col-md">
		    <div class="form-group">
		      <label for="lname">Last name: @if ($errors->has('last_name')) 
	<span class="danger_color ">{{  $errors->first('last_name') }}</span> 
  @endif</label>
		      <input type="text" class="form-control
  			  @if ($errors->has('last_name')) 
			    border border-danger  
  			  @endif
			  " id="lname" name="last_name" value="{{ old('last_name') }}" placeholder="Last name">
		    </div> 
		 </div>
	 </div>
     
    <div class="form-group">
      <label for="email">Email address: @if ($errors->has('email')) 
	<span class="danger_color lead">{{  $errors->first('email') }}</span> 
  @endif @if (isset($email_error)) 
	<span class="danger_color lead">{{  $email_error }}</span> 
  @endif</label>
      <input type="email" class="form-control
  			  @if ($errors->has('email') || isset($email_error)) 
			    border border-danger  
  			  @endif
			  " id="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password: @if ($errors->has('password')) 
	<span class="danger_color lead">{{  $errors->first('password') }}</span> 
  @endif 
  <?php if(isset($password_error)) { ?>
	<span class="danger_color lead">{{  $password_error }}</span> 
  <?php } ?></label>
      <input type="password" class="form-control
  			  @if ($errors->has('password') || isset($password_error)) 
			    border border-danger  
  			  @endif
			  " id="pwd" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label for="cpwd">Confirm Password: @if ($errors->has('confirm_password')) 
	<span class="danger_color lead">{{  $errors->first('confirm_password') }}</span> 
  @endif</label>
      <input type="password" class="form-control
  			  @if ($errors->has('confirm_password') || isset($password_error)) 
			    border border-danger  
  			  @endif
			  " id="cpwd" name="confirm_password" placeholder="Confirm Password" required>
    </div>
	
  
	<div class="form-group">
	  <label for="sel1">Country:</label> 
	  <select class="form-control form-control-lg" id="sel1" name="country" required>
		 <?php
		 	
		 $countries = \App\Country::countries_list();
		 foreach($countries as $country){
		 ?>
	    <option value="{{ $country }}"> {{ $country }}</option>
	    <?php } ?>
	    
	  </select>
	</div>
    <div class="form-group">
      <label for="phone">Phone: @if ($errors->has('phone_number')) 
	<span class="danger_color lead">{{  $errors->first('phone_number') }}</span> 
  @endif</label>
      <input type="number" class="form-control
  			  @if ($errors->has('phone_number')) 
			    border border-danger  
  			  @endif
			  " id="phone" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone number" required>
    </div>
    
	
	
	<div class="form-check-inline form-control-lg">
	  <label class="form-check-label">
	    <input type="radio" class="form-check-input form-control-lg" name="gender" value="male" checked>Male
	  </label>
	</div>
	<div class="form-check-inline form-control-lg">
	  <label class="form-check-label">
	    <input type="radio" class="form-check-input form-control-lg" name="gender" value="female">Female
	  </label>
	</div>
	
	<div class="form-group">
	  <label for="sel1">Package:</label> 
	  <select class="form-control form-control-lg" id="sel1"
              @if(isset($_GET['package']))
              <?php  $pckf= \App\Package::find($_GET['package']);
              if(!empty($pckf)){
              ?>
              disabled
              <?php }?>

              @endif

              name="package" required

      >
		 @foreach($packages as $package)
	    <option value="{{ $package['id'] }}"
        @if(isset($_GET['package']))
            @if($_GET['package']== $package['id'])
                    selected
                @endif

            @endif
        > {{ $package['en_title'] }} ({{ $package['price'] }}$)</option>
	   	@endforeach
	    
	  </select>
	</div>

      <div class="form-group">
          <label for="quantity">Quantity: @if ($errors->has('quantity'))
                  <span class="danger_color lead">{{  $errors->first('quantity') }}</span>
              @endif</label>
          <input type="number" min="1" class="form-control @if ($errors->has('quantity'))border border-danger
@endif" id="quantity" name="quantity" value="{{  old('quantity') }}" placeholder="quantity min : 1 " required>
      </div>


	<div>
		<button type="submit" class="btn btn-primary btn-block delete-marign margin_tb_15"><span class="mbri-success mbr-iconfont mbr-iconfont-btn"></span> Register  </button>
	</div>

      <div>By regestring in this site that means you agree to the following terms : </div>
      <div>
          <a href="{{ url("privacy") }}"> Terms and Conditions </a>
      </div>
	
	
    
  </form>
  <div class="margin_tb_50"></div>
  {{--<ul class="list-group margin_tb_15">--}}
	{{--<li class="list-group-item active">Active item</li>--}}
    {{--<li class="list-group-item">Active item</li>--}}
    {{--<li class="list-group-item">Second item</li>--}}
    {{--<li class="list-group-item">Third item</li>--}}
  {{--</ul>--}}
  {{----}}
</div>

    @else
        <div class="container">
            <div class="margin_tb_50">
                <div><h1>We are sorry , registration process are closed now</h1> </div>
                <div>
                    <a href="{{ url("privacy") }}"> Terms and Conditions </a>
                </div>
            </div>
        </div>



    @endif
@endsection
