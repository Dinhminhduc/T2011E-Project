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
                                <th scope="col">Id</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lsCate as $cate)
                                <tr>
                                    <th scope="row">{{$cate->id}}</th>
                                    <td>{{$cate->name}}</td>
                                    <td>{{$cate->created_at->diffForHumans()}}</td>
                                    <td><a href="{{route('category.edit',$cate->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('category.destroy',$cate->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--                        {{$lsCate->links()}}--}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> Add Category </div>
                        <div class="card-body">
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Add Category</label>
                                        <input type="text" name="name" class="form-control"
                                               id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror

                                    <input type="submit" class="btn btn-primary" value="Add Category">
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
