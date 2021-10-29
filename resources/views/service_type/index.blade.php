@extends('admin.admin')
@section('admin')


    <div @class('container')>
        <p>Loại Dịch Vụ</p>

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


        <a href="{{asset('/service_type/create')}}" class ="btn btn-dark" >Add</a>

        <form action="{{route('service_type.index')}}" method="GET">
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
                <th>ACTION</th>

            </tr>
            @foreach($service_type as $key => $ser)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$ser->name}}</td>
                    <td>
                        <a href="{{route("service_type.edit", $ser->id)}}">Edit</a>
                        <form onsubmit="return confirm('Sure ?')" method="POST" action="{{route('service_type.destroy', $ser->id)}}" >
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{$service_type->links("pagination::bootstrap-4")}}
    </div>

@endsection
