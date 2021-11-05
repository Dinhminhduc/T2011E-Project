@extends('admin.admin')
@section('admin')

<div @class('container')>
   

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

    <a href="{{route('order.index')}}">Back</a>
                

    <table @class("table")>
        <tr>
            <th>ID</th>
            <th>NAME</th>       
            <th>PHONE</th>       
            <th>EMAIL</th>       
            <th>ADRESS</th>
            <th>TIME</th>
        </tr>
       
            <tr>
              
                <td>{{$cus->first_name}} {{$cus->last_name}}</td>
                <td>{{$cus->phone}} </td>
                <td>{{$cus->email}}</td>
                <td>{{$cus->address}}</td>
                <td>
                    @if($cus->date)
                    {{Carbon\Carbon::parse($cus->date)->format('d/m/Y H:i') }} - {{Carbon\Carbon::parse($cus->date)->diffForHumans() }}
                    @else
                    {{$cus->created_at->format('d/m/Y H:i')}}
                    @endif
                </td>
                <td>{{$cus->service->name_service}}</td>    
            </tr>
        </table>
                <h4>Status:
                    @if($cus->status == 0)
                        OPEN
                    @endif
                    @if($cus->status == 1)
                        CONFIRM
                    @endif
                    @if($cus->status == 2)
                        DONE
                    @endif
                    @if($cus->status == 3)
                        CANCEL
                    @endif
                </h4>
                @if($cus->status == 0)
                    <a href="{{asset('changeStatusJson')}}/1/{{$cus->id}}" class="btn btn-primary">Change to CONFIRM</a>
                    <a href="{{asset('changeStatusJson')}}/3/{{$cus->id}}" class="btn btn-primary">Change to CANCEL</a>
                @endif
                @if($cus->status == 1)
                    <a href="{{asset('changeStatusJson')}}/2/{{$cus->id}}" class="btn btn-primary">Change to DONE</a>
                    <a href="{{asset('changeStatusJson')}}/3/{{$cus->id}}" class="btn btn-primary">Change to CANCEL</a>
                @endif
                @if($cus->status == 2)
                    <a href="{{asset('changeStatusJson')}}/3/{{$cus->id}}" class="btn btn-primary">Change to CANCEL</a>
                @endif
        
@endsection