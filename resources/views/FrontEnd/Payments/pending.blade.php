<?php
$header_link = url("public/json/header.json");
$footer_link = url("public/json/footer.json");
$header_json = json_decode(file_get_contents($header_link),true);
$footer_json = json_decode(file_get_contents($footer_link),true);


?>
@extends("FrontEnd.Layout.Payment.master")


@section("content")

    <div class="">
        <div class="text-center">
            <p>We are proccessing your payment order please wait , it may take 2-3 bussiess day <br/> you can contact us here support@08techgroup.com</p>
        </div>
    </div>
@endsection


@section("content2")

@endsection
