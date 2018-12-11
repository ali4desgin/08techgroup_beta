<?php
$header_link = url("public/json/header.json");
$footer_link = url("public/json/footer.json");
$header_json = json_decode(file_get_contents($header_link),true);
$footer_json = json_decode(file_get_contents($footer_link),true);


?>
@extends("FrontEnd.Layout.Payment.master")


@section("content")

@endsection


@section("content2")
@endsection
