@extends("FrontEnd.Layout.Panel.master")

@section("content")
    <form method="post">
        @csrf

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Current Balance : <strong>{{ $customer->balance }}$</strong> </div>


            @if($isAdded)
                <Div class="alert alert-success">Created</Div>
                @endif
            <div class="card-body card-block">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="#" method="post" class="">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="title" name="en_title" placeholder="english title" class="form-control">
                            <div class="input-group-addon"><i class="fa fa-info"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="ar_title" name="ar_title" placeholder="arabic title" class="form-control">
                            <div class="input-group-addon"><i class="fa fa-info"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <select class="form-control" name="package">
                                {{--<option value="0">All Packages</option>--}}
                                @if(!empty($packages))
                                    @foreach($packages as $package)
                                         <option value="{{ $package["id"] }}">{{ $package["en_title"] }}</option>
                                        @endforeach
                                    @endif

                            </select>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<div class="input-group">--}}
                           {{--<select class="form-control">--}}
                               {{--<option>...</option>--}}
                               {{--<option>30 day</option>--}}
                               {{--<option>60 day</option>--}}
                           {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <div class="input-group">
                            <input type="url" id="url" name="url" placeholder="website url" class="form-control">
                            <div class="input-group-addon"><i class="fa fa-link"></i></div>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="file" id="image" name="image" placeholder="image" class="form-control">--}}
                            {{--<div class="input-group-addon"><i class="fa fa-image"></i></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-actions form-group"><button type="submit " class="btn btn-secondary btn-sm">Add</button></div>
                </form>
            </div>
        </div>
    </div>
    </form>
@endsection
