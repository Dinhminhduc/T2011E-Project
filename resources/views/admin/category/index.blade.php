@extends('admin.admin')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong> You should check in on some of those fields below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            All Category
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                    @php($i=1)--}}
                            @foreach($lsCate as $cate)
                                <tr>
                                    <th scope="row">{{$lsCate->firstItem()+$loop->index}}</th>
                                    <td>{{$cate->name}}</td>
                                    <td>{{$cate->created_at->diffForHumans()}}</td>
{{--                                    <td><a href="{{route('category.edit',$cate->id)}}" class="btn btn-info">Edit</a>--}}
{{--                                        <a href="{{route('category.delete',$cate->id)}}" class="btn btn-danger">Delete</a></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--                        {{$lsCate->links()}}--}}
                    </div>
                </div>

{{--                <div class="col-md-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header"> Add Category </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form action="{{route('store.category')}}" method="POST"/>--}}
{{--                                @csrf--}}
{{--                                <form>--}}
{{--                                    <div class="mb-3">--}}
{{--                                        <label for="exampleInputEmail1" class="form-label">Add Category</label>--}}
{{--                                        <input type="text" name="name" class="form-control"--}}
{{--                                               id="exampleInputEmail1" aria-describedby="emailHelp">--}}
{{--                                    </div>--}}
{{--                                    @error('name')--}}
{{--                                    <span class="text-danger">{{$message}}</span>--}}

{{--                                    @enderror--}}

{{--                                    <button type="submit" class="btn btn-primary">Add Category</button>--}}
{{--                                </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    {{--    Trash Part--}}

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        Trash List--}}
{{--                    </div>--}}
{{--                    <table class="table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">SL No</th>--}}
{{--                            <th scope="col">Category Name</th>--}}
{{--                            <th scope="col">Admin</th>--}}
{{--                            <th scope="col">Created At</th>--}}
{{--                            <th scope="col">Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        --}}{{--                    @php($i=1)--}}
{{--                        @foreach($trashCat as $trash)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{$trashCat->firstItem()+$loop->index}}</th>--}}
{{--                                <td>{{$trash->category_name}}</td>--}}
{{--                                <td>{{$trash->user->name}}</td>--}}
{{--                                <td>{{$trash->created_at->diffForHumans()}}</td>--}}
{{--                                <td><a href="{{url('category/restore/'.$trash->id)}}" class="btn btn-info">Restore</a>--}}
{{--                                    <a href="{{url('pdelete/category/'.$trash->id)}}" class="btn btn-danger">Delete</a></td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                    {{$trashCat->links()}}--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-4">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    {{--    End Trash--}}

@endsection
