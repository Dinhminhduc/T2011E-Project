@extends('admin.admin')
@section('admin')

    <div @class('container')>
        <p>Add new type of animal</p>

        @if(count($errors)>0)
            <div @class('alert alert-danger')>
                @foreach($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            </div>
        @endif
        <form @class('form') method="post" action="{{route('animal_type.store')}}">
            @csrf
            Name: <input class="form-control" type ="text" name ="name" required/>
            <input class="btn btn-primary" type="submit" value="save"/>
        </form>
        <?php ?>
    </div>

@endsection
