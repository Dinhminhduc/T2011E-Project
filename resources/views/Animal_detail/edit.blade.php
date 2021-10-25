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
        <form @class('form')  action="{{route('animal_detail.update',$lsDetail->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            Name: <input type ="text" name ="name" class="form-control" value="{{$lsDetail->name}}"/><br>
            Img: <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1"><br>
            Desc: <input class="form-control" type ="text" name ="desc"  value="{{$lsDetail->desc}}"/><br>
            Price: <input class="form-control" type ="text" name ="price" value="{{$lsDetail->price}}" /><br>
            Date of birth: <input class="form-control" type ="date" name ="dob" value="{{$lsDetail->dateOfBirth}}"/><br>
            Animal_type:
            <select name="animal_type">
                @foreach($lsType as $ani)
                    <option value="{{$ani->id}}" {{$ani->id == $lsDetail->animal_id?'selected':''}}>{{$ani->name}}</option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php ?>
    </div>

@endsection
