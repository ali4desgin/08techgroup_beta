@extends("BackEnd.Layout.Dashboard.app")

@section("content")
    <div class="col-12">
        <form action="" method="post" class="card">

            <div class="card-header">
                <h3 class="card-title">تحرير عملية دفع</h3>
            </div>

            <?php
            foreach ($errors->all() as $message) {
               echo "<div class='alert alert-warning'>".$message."</div>";
            }

            ?>
            <div class="card-body">


                    @csrf
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <fieldset class="form-fieldset">
                            <div class="form-group">
                                <label class="form-label">المستخدم<span class="form-required">*</span></label>
                                <select class="form-control" name="customer">

                                    @foreach($customers as $customer)
                                        <option value="{{ $customer['id'] }}">({{ $customer['id'] }}){{ $customer['email'] }}  ({{ $customer['first_name'] ." ".$customer['middel_name'] . $customer['last_name'] }})</option>

                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">الباقة<span class="form-required">*</span></label>
                                <select class="form-control" name="package">
                                    @foreach($packages as $package)
                                        <option value="{{ $package['id'] }}">({{ $package['id'] }}){{ $package['ar_title'] }}  </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">عدد الاشتراكات<span class="form-required">*</span></label>
                                <input type="number" name="quantity" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">البوابة<span class="form-required">*</span></label>
                                <select class="form-control" name="gateway">
                                    <option value="Mbok">Mbok</option>
                                    <option value="BlockChain">BlockChain</option>
                                    <option value="Internal">Internal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">القيمة<span class="form-required">*</span></label>
                                <input type="number" name="value" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">الحالة<span class="form-required">*</span></label>
                                <select class="form-control" name="status">
                                    <option value="active">تفعيل المستخدم</option>
                                    <option value="notactive">عدم التفعيل</option>
                                </select>
                            </div>
                        </fieldset>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <a href="javascript:void(0)" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-auto">Send data</button>
                </div>
            </div>
        </form>

    </div>
    @endsection
