@extends("FrontEnd.Layout.Panel.master")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>My Profile</strong><small> {{ $customer->email }}</small></div>
                <div class="card-body card-block">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group"><label  class=" form-control-label">Firstname</label><input type="text" id="company" value="{{ $customer->first_name }}" placeholder="Enter your First name" class="form-control"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"><label  class=" form-control-label">Middelname</label><input type="text" id="company" value="{{ $customer->middel_name }}" placeholder="Enter your Middel name" class="form-control"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"><label  class=" form-control-label">Lastname</label><input type="text" id="company" value="{{ $customer->last_name }}" placeholder="Enter your Last name" class="form-control"></div>
                        </div>

                    </div>
                    <div class="form-group"><label  class=" form-control-label">Email</label><input type="text" value="{{ $customer->email }}" placeholder="Email" class="form-control" disabled></div>

                    <div class="form-group"><label  class=" form-control-label">Phone</label><input type="text" value="{{ $customer->phone }}" placeholder="phone" class="form-control"></div>

                    <div class="form-group"><label  class=" form-control-label">Password</label><input type="password" value="" placeholder="Password" class="form-control"></div>

                    <div class="form-group"><label  class=" form-control-label">Gender</label>
                        <select class="form-control">
                            <option @if($customer->gender == "male")
                                        selected
                                @endif
                                >Male</option >
                            <option @if($customer->gender == "female")
                                    selected
                                @endif> Female</option>
                        </select>
                    </div>

                    <div class="form-group"><label  class=" form-control-label">County</label>
                        <select class="form-control">
                            <?php

                            $countries = \App\Country::countries_list();
                            foreach($countries as $country){
                            ?>
                            <option value="{{ $country }}"
                            @if($country==$customer->country)
                                    selected
                                @endif
                            > {{ $country }}</option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Save</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
