@extends("BackEnd.Layout.Dashboard.master")

@section("content")

	@if(!empty($editDone))
		<div class="alert alert-success text-center"><i class="fa fa-check"></i>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
			{{  $editDone }}
		</div>
	
	@endif
	<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#home"> تعديل القائمة العليا</a></li>
	  <li><a data-toggle="tab" href="#menu1">تعديل القائمة السفلى</a></li>
	  <li><a data-toggle="tab" href="#menu2">   من نحن</a></li>
	  <!-- <li><a data-toggle="tab" href="#menu3">  الاعلانات</a></li> -->
	  <li><a data-toggle="tab" href="#menu4">  تواصل معنا </a></li>
	  <li><a data-toggle="tab" href="#menu5">  السياسات </a></li>
	</ul>

	<div class="tab-content">
	  <div id="home" class="tab-pane fade in active">
	    <h3 class="heading-text-center">القائمة العلوية</h3>
		<form method="post">
			@csrf
	    <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="ar_title" value="<?php echo $header['ar_title'];?>" class="form-control" placeholder="عنوان الموقع بالعربي ">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="en_title" value="<?php echo $header['en_title'];?>" class="form-control" placeholder="عنوان الموقع بالانجليزي ">
				</div>
			</div>
			
		</div>
		<div class="row">
			
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control"  name="ar_desc" placeholder="الوصف باللغة العربية"><?php echo $header['ar_description'];?></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea   class="form-control " name="en_desc" placeholder="الوصف باللغة الانجليزية"><?php echo $header['en_description'];?></textarea>
				</div>
			</div>
			
		</div>
		
		<div class="row">
			
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" name="keywords" placeholder="الكلمات المفتاحية )سيارات ، بيع ، شراء .. الخ)"><?php echo $header['keywords'];?></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control ltr" name="code" placeholder="كود في الهيدر  "><?php echo $header['code'];?></textarea>
				</div>
			</div>
			
		</div>
		
  		<div class="row">
  			<div class="col-md-12">
  				<button type="submit" name="editType" value="header" class="btn btn-primary btn-block btn-lg"><i class="fa fa-check-circle"></i> حفظ تعديلات القائمة العلوية</button>
  			</div>
  	  </div>
		</form>
	</div>
	  
	  <div id="menu1" class="tab-pane fade">
	    <h3 class="heading-text-center"> القائمة السفلية </h3>
		<form method="post">
			@csrf
	    <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" name="ar_desc" placeholder="التعريف باللغة العربية">{{ $footer['ar_desc'] }}</textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" name="en_desc" placeholder="التعريف باللغة الانجليزية">{{ $footer['en_desc'] }}</textarea>
				</div>
			</div>	
		</div>
		
		    <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" name="ar_copyright" value="{{  $footer['ar_copyright'] }}" placeholder="حقوق النشر بالعربي ">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" name="en_copyright" value="{{  $footer['en_copyright'] }}" placeholder="حقوق النشر الانجليزي ">
					</div>
				</div>	
			</div>
			
			
		    <div class="row">
				<div class="col-md-12">
					<div class="form-group">
  				<button type="submit" name="editType" value="footer" class="btn btn-primary btn-block btn-lg"><i class="fa fa-check-circle"></i> حفظ تعديلات القائمة السفلية</button>
					</div>
				</div>
				
			</div>
	  </div>
	  
	  
	  
	  <div id="menu2" class="tab-pane fade">
	    <h3 class="heading-text-center"> عن المنصة</h3>
		<form method="post">
			@csrf
	    <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" placeholder="التعريف باللغة العربية"></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" placeholder="التعريف باللغة الانجليزية"></textarea>
				</div>
			</div>	
		</div>
		
<!--		    <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" value="" placeholder="حقوق النشر بالانجليزي ">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" value="" placeholder="حقوق النشر بالعربي ">
					</div>
				</div>
			</div>
			 -->
			
		    <div class="row">
				<div class="col-md-12">
					<div class="form-group">
  				<button type="submit" name="editType" value="about_us" class="btn btn-primary btn-block btn-lg"><i class="fa fa-check-circle"></i>حفظ تعديلات من نحن</button>
					</div>
				</div>
				
			</div>
			<!-- tab3 -->
	  </div>
	  
	  
	  
<!--	  <div id="menu3" class="tab-pane fade">
	    <h3 class="heading-text-center"> عن المنصة</h3>
		<form method="post">
			@csrf
	    <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" placeholder="التعريف باللغة العربية"></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" placeholder="التعريف باللغة الانجليزية"></textarea>
				</div>
			</div>
		</div>

		    <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" value="" placeholder="حقوق النشر بالانجليزي ">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" value="" placeholder="حقوق النشر بالعربي ">
					</div>
				</div>
			</div>


		    <div class="row">
				<div class="col-md-12">
					<div class="form-group">
  				<button type="submit" name="editType" value="about_us" class="btn btn-primary btn-block btn-lg"><i class="fa fa-check-circle"></i>حفظ تعديلات من نحن</button>
					</div>
				</div>

			</div>
	  </div>


	   -->
	  
	  
	  <div id="menu4" class="tab-pane fade">
	    <h3 class="heading-text-center"> يبانات التواصل </h3>
		<form method="post">
			@csrf
	    
		
		    <div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control"
						 value="" placeholder="رقم الهاتف الاول">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control"
						 value="" placeholder="رقم الهاتف الثاني">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control"
						 value="" placeholder="ايميل المراسلات">
					</div>
				</div>
			</div>
			
		    <div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control"
						 value="" placeholder="الايميل الظاهري">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control"
						 value="" placeholder="الموقع الجغرافي بالعربية">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control"
						 value="" placeholder="الموقع الجغرافي بالانجليزية">
					</div>
				</div>
			</div>
			
			
		    <div class="row">
				<div class="col-md-12">
					<div class="form-group">
  				<button type="submit" name="editType" value="contact" class="btn btn-primary btn-block btn-lg"><i class="fa fa-check-circle"></i>حفظ تعديلات بيانات التواصل </button>
					</div>
				</div>
				
			</div>
	  </div>
	  
	  
	  
	  
	  <div id="menu5" class="tab-pane fade">
	    <h3 class="heading-text-center"> سياسة الموقع</h3>
		<form method="post">
			@csrf
	    <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" placeholder=" باللغة العربية"></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea class="form-control" placeholder=" باللغة الانجليزية"></textarea>
				</div>
			</div>	
		</div>
		
		    <div class="row">
				<div class="col-md-12">
					<div class="form-group">
  				<button type="submit" name="editType" value="policy" class="btn btn-primary btn-block btn-lg"><i class="fa fa-check-circle"></i>حفظ تعديلات السياسات </button>
					</div>
				</div>
				
			</div>
	  </div>
	</div>
@endsection