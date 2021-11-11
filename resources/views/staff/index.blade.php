@extends('admin.admin')
@section('admin')


    
        <p>Staff members</p>

        @if(session('msg'))
            <div @class("alert alert-success")>
                {{session("msg")}}
            </div>
        @endif

        @if(session("error"))
            <div @class("alert alert-error")>
                {{session("error")}}
            </div>
        @endif


        <a href="{{asset('/staff/create')}}" class ="btn btn-dark" >Add</a>

        <form action="{{route('staff.index')}}" method="GET">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search_name" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>

        <table @class("table")>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>CHỨC VỤ </th>
                <th>CHI TIẾT </th>
                <th>GIỚI THIỆU </th>
                <th>DIA CHI</th>
                <th>HÌNH ẢNH</th>
                <th>SO DIEN THOAI</th>
                {{-- <th>CÔNG VIỆC</th> --}}
                <th>TRẠNG THÁI</th>
                <th>ACTION</th>

            </tr>
            @foreach($staffs as $key => $ser)
         
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$ser->ten}}</td>
                    <td>{{$ser->chucvu}}</td>
                    <td>{{$ser->chitiet}}</td>
                    <td>{{$ser->title}}</td>
                    {{-- <td>

                        @foreach((array) $ser->category as $value)
                            {{$value}}<br>
                        @endforeach
                      
                    </td> --}}
                    {{-- <td>
                        @if( $ser->date_start || $ser->date_end )
                            {{$ser->date_start}} - {{$ser->date_end}}
                        @else
                        <span class="text text-light bg-dark">Chưa cập nhật thời gian</span>
                        @endif
                    </td> --}}
                    <td>{{$ser->diachi}}</td>
                    <td><img src="{{asset('img/staff-img/'.$ser->hinhanh)}}" height="200" width="180" alt></td>
                    <td>{{$ser->sodienthoai}}</td>
                    {{-- <td>{{$ser->service->name_service}}</td> --}}
                  
                    <td>
                        @if ($ser->kichhoat==0)
                        <span class="text text-success">Đang làm việc</span>
                        @else
                        <span class="text text-danger">Nghỉ</span>
                        @endif
                    </td>
                    <td>
                        {{-- <form method="POST" action="{{route('staff.edit', $ser->id)}}"  enctype="multipart/form-data">
                            @csrf
                            @method("POST")
                            <input type="submit" value="Edit" style="width:57px; background-color: yellow"; color:white>
                        </form> --}}
                        <a href="{{route("staff.edit", $ser->id)}}">Edit</a>
                        <form onsubmit="return confirm('Sure ?')" method="POST" action="{{route('staff.destroy', $ser->id)}}" >
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete" style="width:57px; background-color: red"; color:white>
                        </form>
                    </td>
                </tr>
          
            @endforeach
        </table>

        {{$staffs->links("pagination::bootstrap-4")}}
   

@endsection
