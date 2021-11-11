@extends('admin.admin')
@section('admin')

<div @class('container')>
    <p>Dịch Vụ</p>

    @if(session('msg'))
        <div @class("alert alert-success")>
            {{session("msg")}}
        </div>
    @endif

    @if(session("error"))
        <div @class("alert alert-error")>
            {{session("error")}}
        </div>
    @endif
    <form action="{{route('order.index')}}" method="GET">
        @csrf
        <div class="input-group ">
            <input type="text" class="form-control" name="search_name" placeholder="Search name" style="margin-right:10px"> 
            <input type="text" class="form-control" name="phone" placeholder="Search phone" style="margin-right:10px">
            <input type="datetime-local" class="form-control" name="from"  style="margin-right:10px"> 
            <input type="datetime-local" class="form-control" name="to" style="margin-right:10px"> 
            
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
        </div>
    </form>

   

    <table @class("table")>
        <tr>
            <th>ID</th>
            <th>NAME</th>       
            <th>PHONE</th>       
            <th>EMAIL</th>       
            <th>ADRESS</th>
            <th>TIME</th>
            <th>SERVICE</th>
            <th>STATUS</th>
            <th>ACTION</th>

        </tr>
        @foreach($lsCustomer as $key=> $cus)
           @if($cus->status != 3 && $cus->status !=2)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$cus->first_name}} {{$cus->last_name}}</td>
                <td>{{$cus->phone}} </td>
                <td>{{$cus->email}}</td>
                <td>{{$cus->address}}</td>
                <td>
                    @if($cus->date_time)
                        {{Carbon\Carbon::parse($cus->date_time)->format('d/m/Y H:i')}}
                     - {{Carbon\Carbon::parse($cus->date_time)->diffForHumans() }}
                    @else
                        {{$cus->created_at->format('m/d/Y H:i')}}
                    @endif
                </td>
                <td>{{$cus->service->name_service}}</td>    
                <td>
                    @if($cus->status == 0)
                    <span style="color:blue"> WAIT</span>

                    @elseif($cus->status == 1)
                    <span style="color:green"> CONFIRM</span>
                   
                    @elseif($cus->status == 2)
                    <span style="color:rgb(173, 62, 146)"> SUCCESS</span>
                   
                    @elseif($cus->status == 3)
                        <span style="color:red"> CANCEL</span>
                    @endif
                </td>

                <td >

                    <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary" data-orderid="{{$cus->id}}"
                         href="#" >Change status</a>
                    @if($cus->status == 0 ||$cus->status == 1)
                        <a style="width:132px" class="btn btn-success" href="{{route("order.show",$cus->id)}}" >View order</a>
                    @endif
                </td>
                @endif
        @endforeach
    </table>

    <h1 style="margin-top:200px">Order Service Success</h1>
    <table @class("table") >
        <tr>
            <th>ID</th>
            <th>NAME</th>       
            <th>PHONE</th>       
            <th>EMAIL</th>       
            <th>ADRESS</th>
            <th>TIME</th>
            <th>SERVICE</th>
            <th>STATUS</th>
            <th>ACTION</th>

        </tr>
        @foreach($lsCustomer as $key=> $cus)
           @if($cus->status == 3 || $cus->status == 2)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$cus->first_name}} {{$cus->last_name}}</td>
                <td>{{$cus->phone}} </td>
                <td>{{$cus->email}}</td>
                <td>{{$cus->address}}</td>
                <td>
                    @if($cus->date_time)
                        {{Carbon\Carbon::parse($cus->date_time)->format('d/m/Y H:i')}}
                     - {{Carbon\Carbon::parse($cus->date_time)->diffForHumans() }}
                    @else
                        {{$cus->created_at->format('m/d/Y H:i')}}
                    @endif
                </td>
                <td>{{$cus->service->name_service}}</td>    
                <td>
                    @if($cus->status == 0)
                    <span style="color:blue"> WAIT</span>

                    @elseif($cus->status == 1)
                    <span style="color:green"> CONFIRM</span>
                   
                    @elseif($cus->status == 2)
                    <span style="color:rgb(173, 62, 146)">SUCCESS</span>
                   
                    @elseif($cus->status == 3)
                        <span style="color:red"> CANCEL</span>
                    @endif
                </td>

                <td >

                    <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary" data-orderid="{{$cus->id}}"
                         href="#" >Change status</a>
                    {{-- @if($cus->status == 0 ||$cus->status == 1 ||$cus->status == 2)
                        <a style="width:132px" class="btn btn-success" href="{{route("order.show",$cus->id)}}" >View order</a>
                    @endif --}}
                </td>
                @endif
        @endforeach
    </table>

  
</div><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Status:</label>
                        <input type="hidden" name="selected_orderid" id="selected_orderid">
                        <select class="form-control" name="new_status" id="new-status">
                            <option value="1">Confirm</option>
                            <option value="2">Success</option>
                            <option value="3">Cancel</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="change" class="btn btn-primary">Change</button>
            </div>
        </div>
    </div>
</div>
{{-- {{$lsCustomer->links("pagination::bootstrap-4")}} --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('orderid') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#selected_orderid').val(recipient)
        });

        $("#change").click(function() {
            var data = {
                'id' : $("#selected_orderid").val(),
                'status' : $("#new-status").val(),
                "_token": "{{ csrf_token() }}"
            }

            $.get({
                url: '/api/changeStatusJson',
                data: data,
                success: function(response) {
                    alert(response.desc);
                    location.reload();
                },
                error: function(response) {
                    alert(response);
                }
            });
        });
    });
</script>
@endsection
