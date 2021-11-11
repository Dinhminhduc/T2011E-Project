@extends('admin.admin')
@section('admin')
    <div  class="container">
        <p>Type of pet</p>
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

        <a href="{{asset('/animal_type/create')}}" style="margin-bottom: 15px" class="btn btn-primary">Add new</a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @foreach($lsAni as $ani)
                <tr>
                    <td>{{$ani->id}}</td>
                    <td>{{$ani->name}}</td>
                    <td>
                        <form>
                        <a class="btn btn-primary" href="{{route('animal_type.edit',$ani->id)}}">Edit</a>
                        <form method="POST" onsubmit="return confirm('sure ?')" action="{{route("animal_type.destroy",$ani->id)}}">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


@endsection
