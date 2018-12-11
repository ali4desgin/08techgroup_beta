@extends("BackEnd.Layout.Dashboard.app")
@section("content")

            <div class="text-center mar-bottm15">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">اضافة الارباح اليومية</button>
            </div>
			
			

			            <!-- Create new Package -->
			            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			            <div class="modal-dialog" role="document">
			                <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> انشاء باقة جديدة</h4>
			                </div>
			                <form method="post" action="packages">
			                    @csrf
			                <div class="modal-body">
                    
			                        
			                        <div class="form-group">
			                            <input type="number" name="price" placeholder="قيمة الربح" class="form-control"/>
			                        </div>
                        
                    
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			                    <button type="submit" class="btn btn-primary">انشاء</button>
                   
			                </div>
			                </form>
			                </div>
			            </div>
			            </div>
			@endsection
