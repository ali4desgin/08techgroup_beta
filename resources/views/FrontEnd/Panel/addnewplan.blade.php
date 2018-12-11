@extends("FrontEnd.Layout.Panel.master")



@section("content")
    <form action="" method="post">
        @csrf
        <div class="row">





            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add new Package</strong></div>
                    <div class="card-body card-block">

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group"><label class=" form-control-label">Package</label>

                                    <select class="form-control" name="package">
                                        @foreach($packages as $package)
                                        <option value="{{ $package['id'] }}">{{ $package['en_title'] }} ({{ $package['price'] }}$)</option>
                                            @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"><label class=" form-control-label">quantity</label><input type="number"  value="" placeholder="quantity min : 1" class="form-control"  name="quantity"></div>
                            </div>


                        </div>





                        <div class="form-group">
                            <button class="btn btn-info btn-block">Save</button>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
