@extends("FrontEnd.Layout.Panel.master")

@section("content")

<div class="card border border-secondary">
    
    <div class="card-header">
        <div class="message_area_container">
            <form method="post">
                @csrf
                <div class="form-group">
                    <textarea class="form-control input-lg" placeholder="type your replay" name="message"></textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary">Reply</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card-body">
        <h3 class="message_area_container">{{ $ticket->title }}</h3>
        <div class="message_area_container">{{ $ticket->message }}</div>
        <p class="pull-right">
            <span>{{ $ticket->updated_at }}</span>
            <button class="btn btn-success btn-sm">open</button>
        </p>
    </div>
</div>



@if(count($messages))
@foreach($messages as $message)
<div class="card border border-secondary">
    <div class="card-body">
     @if($message['isAdmin']== 1)
        <span class="badge badge-primary">admin</span>
    @else
        <span class="badge badge-success">me</span> 
     @endif
        {{$message->content}}
        <span class="pull-right badge badge-secondary">{{ $message->created_at }}</span>
    </div>
</div>
@endforeach

{{ $messages->links() }}
@else
<div class="card border border-secondary">
    <div class="card-body">
        <div class="alert alert-warning text-center">there no any message yet</div>
    </div>
</div>
@endif
@endsection