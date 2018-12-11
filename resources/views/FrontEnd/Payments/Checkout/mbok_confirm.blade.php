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
            <p>Your Request has been send , wait until our admins activited it<br/>
                Your Case id #12220293</p>
        </div>
    </div>
@endsection


@section("content2")

@endsection
