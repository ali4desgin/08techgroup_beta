@extends("FrontEnd.Layout.Panel.master")

@section("content")

    @if(count($notifications))
        <div class="form-group">
        @foreach($notifications as $notification)
                <li class="list-group-item
                @if($notification['viewed']=='0')
                    alert alert-danger
                @endif
                ">{{ $notification['content'] }} <span class="pull-right">
                        <a href="{{ url("/notification/".$notification['id']) }}"
                        class="btn btn-primary btn-sm"
                        ><i class="fa fa-eye"></i>
                    View
                        </a></span> </li>
        @endforeach
        </div>
        <div class="text-center">{{ $notifications->links() }}</div>

    @else

    @endif

@endsection
