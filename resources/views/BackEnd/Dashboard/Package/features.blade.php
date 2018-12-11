@extends("BackEnd.Layout.Dashboard.app")


@section("content")

	<div class="">
		<h1 class="heading-text-center">{{ $package->ar_title }} <a href='' class='btn btn-success btn-sm ' data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus"></i> اضافة ميزة</a></h1>
	</div>
    @if ($isAdded)
        <div class="alert alert-success text-center">
			<i class="fa fa-check-square"></i>
         	تمت عملية اضافة الميزة الجديدة للباقة بنجاح
        </div>
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
	
	@if(!empty($features))
		<div class="table-responsive">
			<table class="table text-center table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>العنوان بالعربي</th>
						<th>العنوان بالانجليزي</th>
						<th>حذف</th>
					</tr>
				</thead>
				<tbody>
				@foreach($features as $feature)
					<tr>
						<td>{{ $feature['id'] }}</td>
						<td>{{ $feature['ar_feature'] }}</td>
						<td>{{ $feature['en_feature'] }}</td>
						<td><a
							 href="{{ url('adminpanel/package/remove_feature/' .$feature['id'] ) }}" 
							 class="confirm btn btn-danger btn-sm"><i class="fa fa-trash"></i> حذف</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
			
	
	@else
	
		<div class="alert alert-warning text-center">لم يتم اضافة اي مميزات لهذه الباقة</div>
	
	@endif
	
	
	
	

    <!-- Create new Package -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> انشاء ميزة للباقة </h4>
        </div>
        <form method="post" action="">
            @csrf
        <div class="modal-body">
            
                <div class="form-group">
                    <input type="text" name="ar"  placeholder="عربي " class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="text"  name="en" placeholder=" انجليزي" class="form-control"/>
                </div>

            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-primary">اضافة</button>
           
        </div>
        </form>
        </div>
    </div>
    </div>
	
	
	
	
@endsection
