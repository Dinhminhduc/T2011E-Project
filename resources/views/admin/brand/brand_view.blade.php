@extends('admin.admin')
@section('admin')

    <!-- Content Wrapper. Contains page content -->
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Data Tables</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Tables</li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Brand List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Brand Name</th>
                                            <th>Brand Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($brands as $item)
                                        <tr>
                                            <td>{{$item->brand_name}}</td>
                                            <td><img src="{{asset($item->brand_image)}}" style="width: 70px; height: 40px"></td>
                                            <td>
                                                <a class="btn btn-info" href="{{url('brand/edit/'.$item->id)}}">Edit</a>
                                                <a class="btn btn-danger" href="{{url('brand/delete/'.$item->id)}}" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.col -->

{{--Add Brand --}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <h5>Brand Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" required=""> <div class="help-block"></div></div>
                                </div>

                                <div class="form-group">
                                    <h5>Brand Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image"  class="form-control" required=""> <div class="help-block"></div></div>
                                </div>
                                <input type="submit" class="btn btn-outline-dark" value="Add Brand">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    <!-- /.content-wrapper -->

@endsection
