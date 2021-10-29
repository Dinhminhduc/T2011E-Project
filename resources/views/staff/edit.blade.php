@extends('admin.admin')
@section('admin')


    <div @class('container')>
        <p>Update Staff</p>

        @if(count($errors)>0)
            <div @class('alert alert-danger')>
                @foreach($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            </div>
        @endif

        {{--        <form @class('form') method="post" action="{{asset('admin/category')}}">--}}
            <form @class('form') method="post" action="{{route('staff.update',$staffs->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <label>Họ Tên</label>
            <input type="text" name="ten" class="form-control" value="{{$staffs->ten}}"/>

            <label>Chức vụ</label>
            <input type="text" name="chucvu" class="form-control" value="{{$staffs->chucvu}}"/>

            {{-- <label>Lịch làm việc</label>
            @foreach($staffs as $staff)
            <input type="checkbox" name="category[]" value="{{ $staff->id }}"
                 @if (count($case->services->where('id', $service->id)))
                     checked
                 @endif>
            @endforeach --}}

            <label>Ngày Sinh</label>
            <input type="date" name="ngaysinh" class="form-control" value="{{$staffs->ngaysinh}}"/>

            {{-- <label>Giờ làm</label>
            <input type="time" name="date_start" class="form-control" value="{{$staffs->date_start}}"/>

            <label>Giờ nghỉ</label>
            <input type="time" name="date_end" class="form-control" value="{{$staffs->date_end}}"/> --}}

            <label>Địa chỉ</label>
            <input type="text" name="diachi" class="form-control" value="{{$staffs->diachi}}"/>

            <label>Số điện thoại</label>
            <input type="text" name="sodienthoai" class="form-control" value="{{$staffs->sodienthoai}}"/>

            <div class="form-group">
                <label for="exampleInputEmail1">Trạng thái</label>
                <select name="kichhoat" class="custom-select" id="inputGroupSelect02">
                    @if($staffs->kichhoat ==0)
                      <option selected value="0">Đang làm việc</option>
                      <option value="1">Nghỉ</option>
                   @else
                   <option value="0">Đang làm việc</option>
                   <option selected value="1">Nghỉ</option>
                      @endif
                </select>
                </div>
{{--                 
            <div class="form-group checkbox">
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

            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Công việc</label>
                      <select name="servicetype_id" class="custom-select" id="inputGroupSelect02">
                          @foreach($lsService as $Key => $Value)
                            <option {{$Value->id == $staffs->dichvu_id ? 'selected' : ''}} 
                                value="{{$Value->id }}"> {{$Value->name_service}}
                            </option>
                         @endforeach
                      </select>
            </div> --}}
            
            <div class="form-group">
                <label for="exampleInputEmail1">Hình ảnh </label>
                <input type="file" class="form-control" name="hinhanh" id="cover">
                <img src="{{asset('public/img/staff-img/'.$staffs->hinhanh)}}" height="200" width="200" alt>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Edit Files
            </button>
        </form>
    </div>

    <style>
        .ck-editor__editable{
            min-height: 200px;
        }
    </style>
    <script src="{{asset('ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

@endsection
