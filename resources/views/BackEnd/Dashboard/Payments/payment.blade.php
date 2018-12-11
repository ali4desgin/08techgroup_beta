@extends("BackEnd.Layout.Dashboard.app")

@section("content")
    <form method="post">
        @csrf

    <h1 class="text-center">تفاصيل عملية الدفع</h1>
        @if($isEdited)
            <div class="alert alert-success text-center">
                تم تعديل حالة العملية بنجاح
            </div>
            @endif
    <div class="jumbotron">
        <p>

        </p>
        <div class="list-group">
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"> رقم العملية : #{{ $payment['id'] }}</h4>
            </a>

            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">البوابة المستخدمة : {{ $payment['gateway'] }}</h4>
            </a>

            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">نوع العملية :  <?php
                    if($payment->payment_type=="pay"){
                        echo "<span class='btn btn-success btn-sm'>ايداع</span>";
                    }else if($payment->payment_type=="profit"){
                        echo "<span class='btn btn-primary btn-sm'> ارباح</span>";

                    }else if($payment->payment_type=="send"){
                        echo "<span class='btn btn-danger btn-sm'>سحب</span>";
                    }else {
                        echo "<span class='btn btn-warning btn-sm'>طلب </span>";
                    }


                    ?></h4>
            </a>


            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">المرجعية : {{ $payment['refrance'] }}</h4>
            </a>
            <a href="{{ url("/") }}" class="list-group-item">
                <h4 class="list-group-item-heading">القيمة :  {{ $payment['payment_value'] }} دولار </h4>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">ايميل المشتري : {{ $payment['account'] }}</h4>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">المرجعية : {{ $payment['refrance'] }}</h4>
            </a>

            <a  class="list-group-item">
                <h4 class="list-group-item-heading">المستخدم :  {{ $customer['email'] }}</h4>
            </a>


            <a class="list-group-item">
                <h4 class="list-group-item-heading">التاريخ :  {{ $customer['created_at'] }}</h4>
            </a>
            <a  class="list-group-item">
                <h4 class="list-group-item-heading">اخر تحديث :  {{ $customer['updated_at'] }}</h4>
            </a>

            <a  class="list-group-item">
                <h4 class="list-group-item-heading">الحالة :
                    <p class="margin_tb_15"><select class="form-control input-lg" name="status">
                        <option
                            value="pending"
                            @if($payment->status=="pending")
                            selected
                            @endif
                        >في الانتظار</option>
                        <option
                            value="completed"
                            @if($payment->status=="completed")
                            selected
                            @endif
                        >مكتملة</option>
                        <option
                            value="failed"
                            @if($payment->status=="failed")
                            selected
                            @endif
                        >فشلت</option>
                    </select>
                    </p>
                </h4>
            </a>
        </div>
        <p>
            <button class="btn btn-primary btn-lg btn-block" href="#" role="button" type="submit">حفظ</button>
        </p>
    </div>

</form>

@endsection
