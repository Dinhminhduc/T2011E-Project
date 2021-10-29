@extends('admin.admin')
@section('admin')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm dịch vụ </div>

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


                    <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên dịch vụ</label>
                          <input type="text" name="name_service"  class="form-control" 
                          aria-describedby="emailHelp" placeholder="Tên dịch vụ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="number" name="price" class="form-control"
                            aria-describedby="emailHelp" placeholder="Giá dịch vụ">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <textarea type="text"  id="title1" name="title" class="form-control"
                            aria-describedby="emailHelp" placeholder="Title"></textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt</label>
                            <textarea type="text"  id="title2" name="tomtat" class="form-control"
                            aria-describedby="emailHelp" placeholder="Tóm tắt"></textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="hinhanh" class="form-control"
                            aria-describedby="emailHelp" placeholder="Hình ảnh">
                          </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại dịch vụ</label>
                                  <select name="servicetype_id" class="custom-select" id="inputGroupSelect02">
                                      @foreach($lsServiceType as $Key => $Value)
                                        <option value="{{$Value->id}}">{{$Value->name}}</option>
                                     @endforeach
                                  </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Người khám</label>
                                      <select name="staff_id" class="custom-select" id="inputGroupSelect02">
                                          @foreach($lsStaff as $Key => $Value)
                                            <option value="{{$Value->id}}">{{$Value->ten}} - {{$Value->chucvu}}</option>
                                         @endforeach
                                      </select>
                                </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection