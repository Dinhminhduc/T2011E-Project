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


                    <form method="POST" action="{{route('service_type.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên dịch vụ</label>
                          <input type="text" name="name"  class="form-control"
                          aria-describedby="emailHelp" placeholder="Tên dịch vụ">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add">
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
