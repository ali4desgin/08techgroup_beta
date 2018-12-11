@extends("BackEnd.Layout.master")

@section("content")

        <div class="login_area">
            <form method="POST">
            @csrf
            <h1>لوحة التحكم</h1>
            @if (!empty($custom_errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($custom_errors as $error)
                            <li class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
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
            <div class="form-group">
                <input type="email" name="email" class="form-control input-lg fouce_remove_placeholder ltr"   placeholder="البريد الالكتروني">
                
            </div>
            <div class="form-group">
                <input type="password" autocomplete="new-password" name="password" class="form-control input-lg fouce_remove_placeholder ltr" placeholder="كلمة المرور">
            </div>
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
            </div> -->
            <button type="submit" class="btn btn-primary btn-block btn-lg mb-2 "><i class="fa fa-user"></i> تسجيل دخول</button>
            </form>
        </div>

@endsection