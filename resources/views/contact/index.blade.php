@extends('admin.admin')
@section('admin')
    <div  class="container">
        <p>Contact</p>
        @if(@session('msg'))
            <div @class('alert alert-success')>
                {{session('msg')}}
            </div>
        @endif
        @if(@session('error'))
            <div @class('alert alert-danger')>
                {{session('error')}}
            </div>
        @endif

     

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                {{-- <th>Action</th> --}}
            </tr>
            @foreach($contact as $key=>$value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->message}}</td>
                    {{-- <td>
                        <form>
                        <a class="btn btn-primary" href="{{route('animal_type.edit',$ani->id)}}">Edit</a>
                        <form method="POST" onsubmit="return confirm('sure ?')" action="{{route("animal_type.destroy",$ani->id)}}">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </form>
                    </td> --}}
                </tr>
            @endforeach
        </table>
    </div>


@endsection
