@extends('admin.admin')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

{{--                            <form method="post" action="{{ route('store.product') }}" enctype="multipart/form-data" >--}}
                                <form method="post" action="{{url('product/data/update/'.$products->id)}}" >

                                @csrf

                                    <input type="hidden" name="id" value="{{ $products->id }}">

                                    <div class="row">
                                    <div class="col-12">


                                        <div class="row"> <!-- start 1st row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control" required="" >
                                                            <option value="" selected="" disabled="">Select Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected': '' }} >{{ $brand->brand_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control" required="" >
                                                            <option value="" selected="" disabled="">Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected': '' }} >{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 1st row  -->



                                        <div class="row"> <!-- start 2nd row  -->

                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <h5>Name Field<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control"
                                                               required data-validation-required-message="This field is required"
                                                        value="{{$products->name}}">
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->


                                        </div> <!-- end 2nd row  -->

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <h5>Quantity Product<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="number"  value="{{$products->number}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row"> <!-- start 4th row  -->
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Size Product<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="size"  value="{{$products->size}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                                            </div>
                                            </div>


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Price Field<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="price"  value="{{$products->price}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 5th row  -->



{{--                                        <div class="row"> <!-- start 6th row  -->--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <h5>Main Image <span class="text-danger">*</span></h5>--}}
{{--                                                    <div class="controls">--}}
{{--                                                        <input type="file" name="image" class="form-control" onChange="mainThamUrl(this)" >--}}
{{--                                                        @error('image')--}}
{{--                                                        <span class="text-danger">{{ $message }}</span>--}}
{{--                                                        @enderror--}}
{{--                                                        <img src="" id="mainThmb">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}


{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <h5>Multiple Image <span class="text-danger">*</span></h5>--}}
{{--                                                    <div class="controls">--}}
{{--                                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" >--}}
{{--                                                        @error('multi_img')--}}
{{--                                                        <span class="text-danger">{{ $message }}</span>--}}
{{--                                                        @enderror--}}
{{--                                                        <div class="row" id="preview_img"></div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div> <!-- end 6th row  -->--}}


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Description Area<span class="text-danger">*</span></h5>
                                                    <textarea type="text" id="editor1" name="description" rows="10" cols="80">{{$products->description}}
                                            </textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end 8th row  -->

                                        <hr>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1"
                                                            {{$products->hot_deals == 1 ? 'checked': ''}}>
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="featured" value="1"
                                                                {{$products->featured == 1 ? 'checked': ''}}>
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1"
                                                                {{$products->special_offer == 1 ? 'checked': ''}}>
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="special_deals" value="1"
                                                                {{$products->special_deals == 1 ? 'checked': ''}}>
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

        <!-- ///////////////// Start Multiple Image Update Area ///////// -->

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                        </div>


                        <form method="post" action="{{ route('update.product.image') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach($multiImgs as $img)
                                    <div class="col-md-3">

                                        <div class="card">
                                            <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
                                                </div>
                                                </p>

                                            </div>
                                        </div>

                                    </div><!--  end col md 3		 -->
                                @endforeach

                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>



                        </form>





                    </div>
                </div>



            </div> <!-- // end row  -->

        </section>
{{--        End Section Multi Image--}}

    <!-- ///////////////// Start Main Image Update Area ///////// -->

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Main Image <strong>Update</strong></h4>
                        </div>


                        <form method="post" action="{{ route('update.product.mainImage') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <input type="hidden" name="old_img" value="{{ $products->image }}">

                            <div class="row row-sm">

                                <div class="col-md-3">

                                    <div class="card">
                                        <img src="{{ asset($products->image) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                        <div class="card-body">

                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input type="file" name="mainImage" class="form-control" onChange="mainThamUrl(this)"  >
                                                <img src="" id="mainThmb">
                                            </div>
                                            </p>

                                        </div>
                                    </div>

                                </div><!--  end col md 3		 -->


                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>



    </div> <!-- // end row  -->

    </section>
    <!-- ///////////////// End Start Main Image Update Area ///////// -->


    </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>


    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>




@endsection
