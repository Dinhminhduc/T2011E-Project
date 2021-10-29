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
        <form @class('form') method="post" action="{{route('service_type.update',$service_type->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Tên dịch vụ</label>
            <input type="text" name="name" class="form-control" value="{{$service_type->name}}"/>

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
