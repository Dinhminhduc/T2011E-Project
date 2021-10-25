@extends('admin.admin')
@section('admin')
    <div  class="container">
        <p>Animal detail</p>
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


        <a href="{{asset('/animal_detail/create')}}" style="margin-bottom: 15px" class="btn btn-primary">Add new</a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Img</th>
                <th>Desc</th>
                <th>Price</th>
                <th>Date of birth</th>
                <th>Animal_type(id)</th>
                <th>Action</th>
            </tr>
            @foreach($lsAniDetail as $ani_d)
                <tr>
                    <td>{{$ani_d->id}}</td>

                    <td>{{$ani_d->name}}</td>
                    <td>
                        <img src="{{asset($ani_d->img)}}" style="width: 100px;"/>
                    </td>
                    <td>{{$ani_d->desc}}</td>
                    <td>{{$ani_d->price}}</td>
                    <td>{{$ani_d->dateOfBirth}}</td>
                    <td>{{$ani_d->animal_id}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route("animal_detail.edit",$ani_d->id)}}">Edit</a>
                        <form method="POST" onsubmit="return confirm('sure ?')" action="{{route("animal_detail.destroy",$ani_d->id)}}">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


@endsection
