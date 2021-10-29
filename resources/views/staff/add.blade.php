@extends('admin.admin')
@section('admin')


<div class="container" style="color:white">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Thêm nhân viên</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form method="POST" action="{{route('staff.store')}}" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Họ tên</label>
                          <input type="text" name="ten"  class="form-control" 
                          aria-describedby="emailHelp" placeholder="Họ tên">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày sinh</label>
                            <input type="date" name="ngaysinh"  class="form-control" 
                            aria-describedby="emailHelp" placeholder="Ngày sinh">
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Giờ làm</label>
                            <input type="time" name="date_start"  class="form-control" 
                            aria-describedby="emailHelp" placeholder="Giờ làm">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giờ nghỉ</label>
                            <input type="time" name="date_end"  class="form-control" 
                            aria-describedby="emailHelp" placeholder="Giờ nghỉ">
                        </div> --}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="diachi"  class="form-control" 
                            aria-describedby="emailHelp" placeholder="Địa Chỉ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="number" name="sodienthoai"  class="form-control" 
                            aria-describedby="emailHelp" placeholder="Số điện thoại">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" class="form-control" name="hinhanh" id="cover">
                        </div>

                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chức vụ</label>
                            <input type="text" class="form-control" name="chucvu" id="cover">
                        </div>

                        {{-- <div class="form-group checkbox">
                            <label><strong>Lịch làm việc trong tuần :</strong></label><br>
                            <div class="form-check" style="color:white">
                            
                            <input type="checkbox" id="vehicle1" class="listcheck"  name="category[]" value="Thứ hai"> 
                            <label for="vehicle1" >Thứ hai</label><br>
                            <input type="checkbox" id="vehicle2" class="listcheck"  name="category[]" value="Thứ ba"> 
                            <label for="vehicle2" >Thứ ba</label><br>
                            <input type="checkbox" id="vehicle3" class="listcheck"  name="category[]" value="Thứ tư"> 
                            <label for="vehicle3" >Thứ tư</label><br>
                            <input type="checkbox" id="vehicle4" class="listcheck"  name="category[]" value="Thứ năm"> 
                            <label for="vehicle4" >Thứ năm</label><br>
                            <input type="checkbox" id="vehicle5" class="listcheck"  name="category[]" value="Thứ sáu"> 
                            <label for="vehicle5" >Thứ sáu</label><br>
                            <input type="checkbox" id="vehicle6" class="listcheck"  name="category[]" value="Thứ bảy"> 
                            <label for="vehicle6" >Thứ bảy</label><br>
                            <input type="checkbox" id="vehicle7" class="listcheck"  name="category[]" value="Chủ nhật"> 
                            <label for="vehicle7" >Chủ nhật</label><br>
                            </div>
                        </div>   --}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng thái</label>
                            <select name="kichhoat" class="custom-select" id="inputGroupSelect02">
                                <option value="0">Đang làm việc</option>
                                <option value="1">Nghỉ</option>
                            </select>
                            </div>

                        {{-- <label>Which do you option</label><br/> --}}
                        {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Thể loại</label>
                              <select name="dichvu_id" class="custom-select" id="inputGroupSelect02">
                                  @foreach($lsService as $Key => $Value)
                                    <option value="{{$Value->id}}">{{$Value->name_service}}</option>
                                 @endforeach
                              </select>
                        </div> --}}
                        

                        <button type="submit" class="btn btn-primary">Thêm</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
