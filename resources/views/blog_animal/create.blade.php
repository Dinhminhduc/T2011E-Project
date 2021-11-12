@extends('admin.admin')
@section('admin')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Blog</div>

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


                    <form method="POST" action="{{route('blog_animal.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên</label>
                          <input type="text" name="name"  class="form-control"
                          aria-describedby="emailHelp" placeholder="Tên dịch vụ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <input type="text" name="title"  class="form-control" id="slug"
                            onkeyup="ChangeToSlug()"
                            aria-describedby="emailHelp" placeholder="Tên dịch vụ">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Slug </label>
                            <input type="text" name="slug"  class="form-control" id="convert_slug"
                            aria-describedby="emailHelp" placeholder="Slug dịch vụ">
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá </label>
                            <input type="text" name="tukhoa" data-role="tagsinput"  class="form-control"
                            aria-describedby="emailHelp" placeholder="Slug dịch vụ">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt</label>
                            <textarea type="text"  id="ckeditor1" name="tomtat"  class="form-control"
                            aria-describedby="emailHelp" placeholder="Tên dịch vụ"></textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Chi tiết</label>
                            <textarea type="text"  id="ckeditor2" name="description"  class="form-control"
                            aria-describedby="emailHelp" placeholder="Tên dịch vụ"></textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="hinhanh" class="form-control"
                            aria-describedby="emailHelp" placeholder="Hình ảnh">
                          </div>



                        <input type="submit" class="btn btn-primary" value="Add">
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
