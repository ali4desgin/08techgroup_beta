@extends("FrontEnd.Layout.Panel.master")

@section("content")
	<div class="tickets">
                    <div class="form-group text-center">
                    <button data-toggle="modal"  data-target="#mediumModal" class="btn btn-primary ceneter-block"><i class="fa fa-ticket"></i> Create ticket </button>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Ticket History </h4>
                                </div>
                                <div class="card-body--">

                                    @if(count($tickets)>=1)
                                    <div class="table-stats order-table ov-h table-bordered">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">title</th>
                                                    <th class="text-center">created at</th>
                                                    <th class="text-center">last update</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach($tickets as $ticket)
                                                    <tr>
                                                        <td class="text-center">{{ $ticket['id'] }}</td>
                                                        <td class="text-center"><A href="{{ url('view_ticket/'. $ticket['id']) }}">{{ $ticket['title'] }}</A></td>
                                                        <td class="text-center">{{ $ticket['created_at'] }}</td>
                                                        <td class="text-center">{{ $ticket['updated_at'] }}</td>
                                                        <td class="text-center">
                                                            <?php
                                                            if($ticket['status']=="new"){
                                                            ?>
                                                            <span class="btn btn-success btn-sm text-white">new </span>
                                                            <?php
                                                            }else if($ticket['status']=="adminreplay"){
                                                            ?>
                                                            <span class="btn btn-warning btn-sm text-white">admin reply</span>
                                                            <?php
                                                            }else if($ticket['status']=="userreplay"){
                                                            ?>
                                                            <span class="btn btn-info btn-sm text-white">waiting</span>
                                                            <?php
                                                            }else{

                                                            ?>
                                                            <span class="btn btn-danger btn-sm text-white">closed</span>
                                                            <?php
                                                            }

                                                            ?>


                                                        </td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>



                                        
                                    </div> <!-- /.table-stats -->
                                    

                                    
                                    {{ $tickets->links() }}

                                    @else
                                        <div class="alert alert-warning text-center">there is no any </div>
                                    @endif
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    </div>
                </div>



<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
    <form method="post">
        @csrf()
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Create Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <input type="text" name="title" class="form-control" id="title"  placeholder="Ticket Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control input-lg" name="message" placeholder="message.."></textarea>
                </div>
               
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
        </form>
    </div>
</div>


@endsection
