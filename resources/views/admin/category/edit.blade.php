@extends('admin.admin')
@section('admin')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> Edit Category </div>
                        <div class="card-body">
                            <form action="{{route('category.update', $cate->id)}}" method="POST"/>
                            @csrf
                                @method('PUT')
                                <div class="form-group">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Category Name</label>
                                    <input type="text" name="name" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$cate->name}}">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>

                                @enderror

                            <button type="submit" class="btn btn-primary">Update Product</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
