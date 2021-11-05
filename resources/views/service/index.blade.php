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


        <a href="{{asset('/service/create')}}" class ="btn btn-dark" >Add</a>

        <form action="{{route('service.index')}}" method="GET">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search_name" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>

        <table @class("table")>
            <tr>
                <th>ID</th>
                <th>NAME</th>       
                <th>SLUG</th>       
                <th>DESCRIPTION</th>       
                <th>TOMTAT</th>       
                <th>SERVICE</th>
                <th>STAFF</th>
                <th>PRICE</th>
                <th>HÌNH ẢNH</th>
                <th>ACTION</th>

            </tr>
            @foreach($services as $key=> $ser)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$ser->name_service}}</td>
                    <td>{{$ser->slug}}</td>
                    <td>{!!$ser->title!!}</td>
                    <td>{!!$ser->tomtat!!}</td>
                 
                    <td>{{$ser->servicetype->name}}</td>
                    <td>{{$ser->staff->chucvu}}</td>
                    <td>
                        @if($ser->name_service == 'Nuôi hộ')
                          {{$ser->price}} - {{$ser->price_end}}(/giờ)
                          @else 
                          {{$ser->price}} - {{$ser->price_end}}
                          @endif
                    </td>
                    <td><img src="{{asset('img/service-img/'.$ser->hinhanh)}}" height="200" width="200" alt></td>
                    <td>
                        <a href="{{route("service.edit", $ser->id)}}">Edit</a>
                        <form onsubmit="return confirm('Sure ?')" method="POST" action="{{route('service.destroy', $ser->id)}}" >
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{$services->links("pagination::bootstrap-4")}}
    </div>

@endsection
