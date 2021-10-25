@extends('admin.admin')
@section('admin')

    <div @class('container')>
        <p>Edit type of animal</p>

        @if(count($errors)>0)
            <div @class('alert alert-danger')>
                @foreach($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            </div>
        @endif

        <form @class('form') method="POST" action="{{route('animal_type.update',$ani->id)}}">
            @csrf
            @method('PUT')
            Name: <input type ="text" name ="name" value="{{$ani->name}}" required/>
            <input type="submit" value="save"/>
        </form>

    </div>

@endsection
