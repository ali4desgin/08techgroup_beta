@extends("BackEnd.Layout.Dashboard.app")


@section("content")
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-profile">
                        <div class="card-header">
                            {{  $ticket->title }}
                        </div>
                        <div class="card-body text-center">

                            <h3 class="mb-3">{{ $customer->email }}</h3>
                            <p class="mb-4">
                                {{  $ticket->message }}
                            </p>

                        </div>
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="card">
                       <form method="post" action="">
                           @csrf

                        <div class="card-header">
                            <div class="input-group">
                                <textarea  class="form-control" placeholder="Message" name="message"></textarea>
                                <div class="input-group-append">
                                    <button type="Submit" class="btn btn-secondary">
                                        <i class="fe fe-send"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                       </form>
                        <ul class="list-group card-list-group">

                            @if(!empty($messages))
                                @foreach($messages as $message)
                                    @if($message['isAdmin']==0)
                            <li class="list-group-item py-5">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <span class="pull-left">{{ $message['created_at'] }}</span>
                                            <h5><button class="btn btn-twitter">{{ $customer->email }}</button></h5>
                                        </div>
                                        <div>
                                            {{ $message["content"] }}
                                        </div>
                                    </div>
                                </div>
                            </li>

                                    @else
                            <li class="list-group-item py-5">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <span class="pull-right">{{ $message['created_at'] }}</span>
                                            <h5 class="float-left " ><button class="btn btn-facebook">Admin</button> </h5>
                                            <h5>.</h5>
                                        </div>
                                        <div>
                                            {{ $message["content"] }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                                    @endif

                                @endforeach
                                @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
