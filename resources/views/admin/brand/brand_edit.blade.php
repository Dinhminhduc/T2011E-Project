@extends('admin.admin')
@section('admin')
    <div class="container-full">
        <div class="row">
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Brand Edit</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{url('brand/update/'.$brand->id)}}" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" name="old_image" value="{{$brand->brand_image}}"/>
                <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Brand Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{$brand->brand_name}}" > <div class="help-block"></div></div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control" value="{{$brand->brand_image}}" > <div class="help-block"></div></div>
                                    </div>

                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">

                                </div>
                            </div>
                        </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
</div>
</div>
</div>

@endsection
