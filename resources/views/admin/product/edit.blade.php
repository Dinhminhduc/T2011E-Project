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
                        <div class="card-header"> Edit Product </div>
                        <div class="card-body">
                            <form action="{{url('admin/product/update/'.$products->id)}}" method="POST" enctype="multipart/form-data"/>
                            @csrf
                            <input type="hidden" name="old_image" value="{{$products->image}}"/>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$products->name}}">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>

                                @enderror

                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Product Price</label>
                                    <input type="text" name="price" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$products->price}}">
                                </div>
                                @error('price')
                                <span class="text-danger">{{$message}}</span>

                                @enderror

                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Product Number</label>
                                    <input type="text" name="number" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$products->number}}">
                                </div>
                                @error('number')
                                <span class="text-danger">{{$message}}</span>

                                @enderror

                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Brand Image</label>
                                    <input type="file" name="image" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$products->image}}">
                                </div>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>

                                @enderror

                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Product Size</label>
                                    <input type="text" name="size" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$products->size}}">
                                </div>
                                @error('size')
                                <span class="text-danger">{{$message}}</span>

                                @enderror
                            </div>

                            <div class="form-group">
                                <img src="{{asset($products->image)}}" style="width: 400px; height: 200px">

                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
