@extends("FrontEnd.Layout.Panel.master")



@section("content")

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Your Info</h6>




        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">package : {{ \App\Package::find($customer->package_id)["en_title"] }}</strong>

            </p>
        </div>


        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"> id : #{{ $customer->id }} </strong>

            </p>
        </div>

        {{--<div class="media text-muted pt-3">--}}
            {{--<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">--}}
                {{--<strong class="d-block text-gray-dark"> balance : {{ $customer->balance }}$ </strong>--}}

            {{--</p>--}}
        {{--</div>--}}

        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"> balance : {{ $customer->balance }}$ </strong>

            </p>
        </div>



        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"> phone : {{ $customer->phone }} </strong>

            </p>
        </div>



        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"> email : {{ $customer->email }} </strong>

            </p>
        </div>

        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"> registerd at : {{ $customer->created_at }} </strong>

            </p>
        </div>
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">url : {{ url("/") }}?callerid={{ $customer->customerid }} </strong>

            </p>
        </div>

    </div>

@endsection
