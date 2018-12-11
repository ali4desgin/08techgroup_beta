<?php
$header_link = url("public/json/header.json");
$footer_link = url("public/json/footer.json");
$header_json = json_decode(file_get_contents($header_link),true);
$footer_json = json_decode(file_get_contents($footer_link),true);

 $gatways_json = json_decode(file_get_contents("public/json/payments_mthods.json"),true);


$paypal_json = json_decode(file_get_contents(url("public/json/gateways/PayPal.json")),true);
$payeer_json = json_decode(file_get_contents(url("public/json/gateways/PayEer.json")),true);
$paypal = $paypal_json['development'];
?>
@extends("FrontEnd.Layout.Payment.master")


@section("content")

<form action="{{ url('checkout/redirect') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-12">
        
            <div class="martb20">
                <h5>Choose your payment gateway</h5>
            </div>
        
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <ul class="list-group">
                    @if($gatways_json["PayPal"])
                    <li class="list-group-item">PayPal <span class="pull-right"><input type="radio" name="payment" value="paypal" checked/></span></li>
                    @endif

                    @if($gatways_json["BlockChain"])
                    <li class="list-group-item">BlockChain <span class="pull-right"><input type="radio" name="payment" value="blockchain" checked/></span></li>
                    @endif

                    {{--@if($gatways_json["PayPal"])--}}
                {{--<li class="list-group-item">Payeer <span class="pull-right"><input type="radio" name="payment" value="payeer"/></span></li>--}}
                    {{--@endif--}}

                        @if($gatways_json["Mbok"])
                <li class="list-group-item">Mbok <span class="pull-right"><input type="radio" name="payment" value="mbok"/></span></li>
                            @endif
            </ul>
        </div>
    </div>
  

  <div class="row">
    <div class="col-sm-12">
        <div class="martb20"><button class="btn btn-success btn-lg btn-block">Pay</button></div>
    </div>
  </div>

</form>
@endsection


@section("content2")
@endsection
