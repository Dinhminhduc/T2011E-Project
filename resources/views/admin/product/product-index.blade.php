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
                                <th scope="col">No</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Number</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Size</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                    @php($i=1)--}}
                            @foreach($products as $pro)
                                <tr>
                                    <th scope="row">{{$products->firstItem()+$loop->index}}</th>
                                    <td>{{$pro->name}}</td>
                                    <td>{{$pro->price}}</td>
                                    <td>{{$pro->number}}</td>
                                    <td><img src="{{asset($pro->image)}}" style="height:40px; width: 70px;"></td>
                                    <td>{{$pro->size}}</td>
                                    <td>{{$pro->created_at->diffForHumans()}}</td>
                                    <td><a href="{{url('admin/product/edit/'.$pro->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('admin/product/delete/'.$pro->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> Add Product </div>
                        <div class="card-body">
                            <form action="{{route('add.product')}}" method="POST" enctype="multipart/form-data"/>
                                @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="text" name="price" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Number</label>
                                    <input type="text" name="number" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                @error('number')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Image</label>
                                    <input type="file" name="image" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Size</label>
                                    <input type="text" name="size" class="form-control"
                                           id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                @error('size')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Trash Part--}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Trash List
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Number</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Size</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trashProduct as $trash)
                            <tr>
                                <th scope="row">{{$trashProduct->firstItem()+$loop->index}}</th>
                                <td>{{$trash->name}}</td>
                                <td>{{$trash->price}}</td>
                                <td>{{$trash->number}}</td>
                                <td><img src="{{asset($trash->image)}}" style="height:40px; width: 70px;"></td>
                                <td>{{$trash->size}}</td>
                                <td>{{$trash->created_at->diffForHumans()}}</td>
                                <td><a href="{{url('admin/product/restore/'.$trash->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{url('admin/product/pdelete/'.$trash->id)}}" onclick="return confirm('Are you sure ?')" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$trashProduct->links()}}
                </div>
            </div>

            <div class="col-md-4">

            </div>
        </div>
    </div>

    {{--    End Trash--}}

@endsection







