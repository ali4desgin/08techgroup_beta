@extends("BackEnd.Layout.Dashboard.app")

@section("content")
	<div class="">
		<h1 class="heading-text-center"><i class="fa fa-edit"></i>  </h1>
		@if($isEdited)
			<div class="alert alert-success lead text-center"> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<i class="fa fa-thumbs-up"></i> تم تعديل البيانات</div>
		@endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<form method="post">
			@csrf
			
				<div class="row">
					<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control input-lg" value=""
						 placeholder="رقم الباقة # {{ $package->id }}" disabled >
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" value="{{ $package->ar_title }}"
						 class="form-control input-lg" name="ar_title" placeholder="العنوان بالعربي "
						  required>
					 </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" value="{{ $package->en_title }}"
						 	class="form-control input-lg" name="en_title" placeholder=" العنوان بالانجليزي" required>
						</div>
					</div>
					
				</div>
				
		
			
			
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<textarea class="form-control input-lg" placeholder="الوصف باللغة العربية" name="ar_note">{{ $package->ar_note }}</textarea>
					 	</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea class="form-control input-lg" placeholder="الوصف باللغة الانجليزية" name="en_note">{{ $package->en_note }}</textarea>
					 	</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="number" min="0" value="{{ $package->price }}" class="form-control input-lg" name="price" placeholder="سعر الباقة">
						</div>
					</div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" min="0" value="{{ $package->expire_after }}" class="form-control input-lg" name="expire_at" placeholder="مدة الباقة">
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<button class="btn btn-primary btn-block btn-lg"
							 type="submit">
							 <i class="fa fa-check-circle"></i> تعديل</button>
					 	</div>
				 </div>
			 	</div>
			
		</form>
	</div>
@endsection
