<?php
$header_link = url("public/json/header.json");
$footer_link = url("public/json/footer.json");
$header_json = json_decode(file_get_contents($header_link),true);
$footer_json = json_decode(file_get_contents($footer_link),true);

// $footer_json = json_decode(file_get_contents("json/footer.json"),true);
$mbok_json = json_decode(file_get_contents(url("public/json/gateways/mbok.json")),true);
//var_dump($mbok_json["development"]);
//exit();
$mbok = $mbok_json["development"];
?>
@extends("FrontEnd.Layout.Payment.master")


@section("content")

<form action="{{ url('/checkout/mbok/confirm') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-12">
        
            <div class="martb20">
                <h3>Mbok Payment</h3>
            </div>
        
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <ul class="list-group">
                <li class="list-group-item">Account   <span class="pull-right">{{ $mbok["account_number"] }}</span></li>
                <li class="list-group-item">Branch  <span class="pull-right">{{ $mbok["mbok_bransh"] }}</span></li>
                <li class="list-group-item">Username    <span class="pull-right">{{ $mbok["mbok_user"] }}</span></li>
                <li class="list-group-item">Phone number <span class="pull-right">{{ $mbok["phone_number"] }}</span></li>
                <li class="list-group-item">Mbok number   <span class="pull-right">{{ $mbok["mbok_number"] }}</span></li>
                <li class="list-group-item">Payment Amount   <span class="pull-right"> <span style="color:red">{{ $price }} </span><b>SDG</b></span></li>
                 <li class="list-group-item"><input type="text" class="form-control input-lg" placeholder="Payment ID" name="paymentid"/></li>
                <li class="list-group-item"><input type="text" class="form-control input-lg" placeholder="Your Account number" name="account_number"/></li>
            </ul>
        </div>
    </div>
  

  <div class="row">
    <div class="col-sm-12">
        <div class="martb20"><button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-eye"></i> Confirm</button></div>
    </div>
  </div>

</form>
@endsection


@section("content2")
@endsection
