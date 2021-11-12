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
        <form @class('form') method="post" action="{{route('animal_detail.store')}}" enctype="multipart/form-data">
            @csrf
            Name: <input type ="text" name ="name" class="form-control"/><br>
            Img: <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1"><br>
            Desc: <input class="form-control" type ="text" name ="desc" required/><br>
            Price: <input class="form-control" type ="text" name ="price" required/><br>
            Date of birth: <input class="form-control" type ="date" name ="dob" required/><br>
            Animal_type:
            <select name="animal_type">
                @foreach($lsAni as $ani)
                    <option value="{{$ani->id}}">{{$ani->name}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
        <?php ?>
    </div>

@endsection
