@extends("BackEnd.Layout.Dashboard.app")

@section("content")
    <!-- Create new Package -->
        {{--<div class="col-sm-12" role="document">--}}

                {{--<form method="post" action="{{ url("adminpanel/packages") }}">--}}
                    {{--@csrf--}}
                    {{--<div class="modal-body">--}}

                        {{--<div class="form-group">--}}
                            {{--<input type="text" name="ar_title"  placeholder="العنوان بالعربي" class="form-control"/>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<textarea class="form-control" name="ar_note"  placeholder="الوصف باللغة العربية"></textarea>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="text"  name="en_title" placeholder="العنوان بالانجليزي" class="form-control"/>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<textarea class="form-control" name="en_note" placeholder="الوصف باللغة الانجليزية"></textarea>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="number" name="price" placeholder="السعر" class="form-control"/>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="number" name="ad_price" placeholder="سعر الاعلان في الباقة لمدة 30 يوما" class="form-control"/>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="number" name="distance" placeholder="مدة الباقة" class="form-control"/>--}}
                        {{--</div>--}}


                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="submit" class="btn btn-blue btn-block text-center">انشاء</button>--}}

                    {{--</div>--}}
                {{--</form>--}}
    {{--</div>--}}


    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li class="error">{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif


    <div class="col-lg-12">
        <form method="post" action="{{ url("adminpanel/packages") }}">
            @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">اضافة باقة</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" name="ar_title"  placeholder="العنوان بالعربي" class="form-control"/>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="ar_note"  placeholder="الوصف باللغة العربية"></textarea>
                </div>
                <div class="form-group">
                    <input type="text"  name="en_title" placeholder="العنوان بالانجليزي" class="form-control"/>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="en_note" placeholder="الوصف باللغة الانجليزية"></textarea>
                </div>
                <div class="form-group">
                    <input type="number" name="price" placeholder="السعر" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="number" name="ad_price" placeholder="سعر الاعلان في الباقة لمدة 30 يوما" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="number" name="distance" placeholder="مدة الباقة" class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="submit" name="field-name" class="btn btn-blue btn-block text-center"  value="save">
                </div>
            </div>
        </div>
    </form>
    </div>



@endsection
