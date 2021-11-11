@extends('admin.admin')
@section('admin')


    <div @class('container')>
        <p>Update Blog</p>

        @if(count($errors)>0)
            <div @class('alert alert-danger')>
                @foreach($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            </div>
        @endif

        {{--        <form @class('form') method="post" action="{{asset('admin/category')}}">--}}
        <form @class('form') method="post" action="{{route('blog_animal.update',$blog->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Tên </label>
            <input type="text" name="name" class="form-control" value="{{$blog->name}}"/>

            <label>Nội dung </label>
            <input type="text" name="title" id="slug" onkeyup="ChangeToSlug()" class="form-control" value="{{$blog->title}}"/>

            <label>Slug </label>
            <input type="text" name="slug" id="convert_slug" class="form-control" value="{{$blog->slug}}"/>

            <label>Từ khoá </label>
            <input type="text" name="tukhoa" data-role="tagsinput" class="form-control" value="{{$blog->tukhoa}}"/><hr/>

            <label for="title1">Tóm tắt</label>
            <textarea size="50" type="text" id="ckeditor1" class="form-control" name="tomtat" rows="15" cols="100">
                    {{$blog->tomtat}}
            </textarea>
            
            <label for="title2">Chi tiết</label>
            <textarea  id="ckeditor2"  type="text" size="50" class="form-control" name="description" rows="15" cols="100">
                {{$blog->description}}
            </textarea>

            <div class="form-group">
                <label for="exampleInputEmail1">Hình ảnh </label>
                <input type="file" class="form-control" name="hinhanh" id="cover">
                <img src="{{asset('public/img/blog-img/'.$blog->hinhanh)}}" height="200" width="200" alt>
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
