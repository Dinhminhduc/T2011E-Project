@extends('admin.admin')
@section('admin')

    <div @class('container')>
        <p>Add new testimonials</p>

        @if(count($errors)>0)
            <div @class('alert alert-danger')>
                @foreach($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            </div>
        @endif
        <form @class('form') method="post" action="{{route('testimonials.store')}}">
            @csrf
            Name: <input class="form-control" type ="text" name ="name"/>
            Job: <input class="form-control" type ="text" name ="job"/>
            Testimonials: <input class="form-control" type ="text" name ="testi"/>
            <input class="btn btn-primary" type="submit" value="save"/>
        </form>
    </div>

@endsection
