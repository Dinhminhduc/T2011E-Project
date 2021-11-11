@extends('admin.admin')
@section('admin')


    <div @class('container')>
        <h1>BLog</h1>

        @if(session('msg'))
            <div @class("alert alert-success")>
                {{session("msg")}}
            </div>
        @endif

        @if(session("error"))
            <div @class("alert alert-error")>
                {{session("error")}}
            </div>
        @endif


        <a href="{{asset('/blog_animal/create')}}" class ="btn btn-dark" >Add</a>

        <form action="{{route('blog_animal.index')}}" method="GET">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search_name" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>

        <table @class("table")>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>TITLE</th>
                <th>TUKHOA</th>
                <th>SLUG</th>
                <th>SUMMARY</th>
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
                <th>ANIMAL_ID</th>
                <th>ACTION</th>

            </tr>
            @foreach($blogs as $key => $blog)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$blog->name}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->tukhoa}}</td>
                    <td>{{$blog->slug}}</td>
                    <td>{!!$blog->tomtat!!}</td>
                    <td>{!!$blog->description!!}</td>
                    <td><img src="{{asset('img/blog-img/'.$blog->hinhanh)}}" height="200" width="200" alt></td>
                    <td></td>
                    <td>
                        <a href="{{route("blog_animal.edit", $blog->id)}}">Edit</a>
                        <form onsubmit="return confirm('Sure ?')" method="POST" action="{{route('blog_animal.destroy', $blog->id)}}" >
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{$blogs->links("pagination::bootstrap-4")}}
    </div>

@endsection
