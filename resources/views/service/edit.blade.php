@extends('admin.admin')
@section('admin')


    <div @class('container')>
        <p>Update Service</p>

        @if(count($errors)>0)
            <div @class('alert alert-danger')>
                @foreach($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            </div>
        @endif

        {{--        <form @class('form') method="post" action="{{asset('admin/category')}}">--}}
        <form @class('form') method="post" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Tên dịch vụ</label>
            <input type="text" name="name_service" id="slug" onkeyup="ChangeToSlug()" class="form-control" value="{{$service->name_service}}"/>

            <label>Slug dịch vụ</label>
            <input type="text" name="slug" id="convert_slug" class="form-control" value="{{$service->slug}}"/>

            <label for="title1">Title</label>
            <textarea size="50" type="text" id="title1" class="form-control" name="title" rows="15" cols="100">
                    {{$service->title}}
            </textarea>
            
            <label for="title2">Tóm tắt</label>
            <textarea  id="title2"  type="text" size="50" class="form-control" name="tomtat" rows="15" cols="100">
                {{$service->tomtat}}
            </textarea>
           

            <label>Giá tiền khoảng</label>
            <input type="text" name="price" class="form-control" value="{{$service->price}}"/>
            <input type="text" name="price_end" class="form-control" value="{{$service->price_end}}"/>

            <div class="form-group">
                <label for="exampleInputEmail1">Dịch vụ</label>
                      <select name="servicetype_id" class="custom-select" id="inputGroupSelect02">
                          @foreach($lsServiceType as $Key => $Value)
                            <option {{$Value->id == $service->servicetype_id ? 'selected' : ''}} 
                                value="{{$Value->id }}"> {{$Value->name}}
                            </option>
                         @endforeach
                      </select>
            </div>



            <div class="form-group">
                <label for="exampleInputEmail1">Người khám</label>
                      <select name="staff_id" class="custom-select" id="inputGroupSelect02">
                          @foreach($lsStaff as $Key => $Value)
                            <option {{$Value->id == $service->staff_id ? 'selected' : ''}}  
                                value="{{$Value->id }}"> {{$Value->chucvu}}
                            </option>
                         @endforeach
                      </select>
            </div>
           
            <div class="form-group">
                <label for="exampleInputEmail1">Hình ảnh </label>
                <input type="file" class="form-control" name="hinhanh" id="cover">
                <img src="{{asset('public/img/service-img/'.$service->hinhanh)}}" height="200" width="200" alt>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Edit Files
            </button>
        </form>
    </div>

    <style>
        .ck-editor__editable{
            min-height: 200px;
        }
    </style>
    <script src="{{asset('ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

@endsection

@section( 'scripts')
    <script>
        ClassicEditor
        .create( document.querySelector( '#title1' ) )
        .catch( error => {
            console.error( error );
        } );
        .create( document.querySelector( '#title2' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection