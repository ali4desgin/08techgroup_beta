@extends("FrontEnd.Layout.Panel.master")


<?php
if(!empty($walletinfo)){
    $provider = $walletinfo->gateway;
    $account = $walletinfo->account;
    $other = $walletinfo->other;
    $phone = $walletinfo->phone;
}else{
    $provider ="";
    $account = "";
    $other = "";
    $phone = "";
}

?>

@section("content")
    <form action="" method="post">
        @csrf
    <div class="row">


        @if($isUpadted)
            <div class="col-sm-12">
                <div class="alert alert-success text-center"><i class="fa fa-right"></i> Updated</div>
            </div>

            @endif


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>My Wallet Info</strong></div>
                <div class="card-body card-block">
                    <div class="form-group"><label class=" form-control-label">Provider</label>
                        <select class="form-control" name="provider">
                            <option value="0" selected=""> ....</option>
                            <option value="paypal"
                                    @if($provider=="paypal")
                                        selected
                                        @endif
                            > PayPal</option>
                            <option value="mbok"
                                    @if($provider=="mbok")
                                    selected
                                @endif
                            > Mbok</option>
                            <option value="blockchain"
                                    @if($provider=="blockchain")
                                    selected
                                @endif
                            > BlockChain</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group"><label class=" form-control-label">Account</label><input type="text"  value="{{ $account }}" placeholder="Enter Account" class="form-control" name="account"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"><label class=" form-control-label">Phone</label><input type="text"  value="{{ $phone }}" placeholder="Enter your Phone" class="form-control"  name="phone"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"><label class=" form-control-label">Other info</label><input type="text" id="other" value="{{ $other }}" placeholder="Other info" class="form-control" name="other"></div>
                        </div>

                    </div>





                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Save</button>
                    </div>

                    <p>Your Wallet Info Will be used to send your profit for you</p>

                </div>
            </div>
        </div>

    </div>
    </form>
@endsection
