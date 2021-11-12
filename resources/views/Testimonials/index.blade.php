@extends('admin.admin')
@section('admin')
    <div  class="container">
        <p>Testimonials</p>
        @if(@session('msg'))
            <div @class('alert alert-success')>
                {{session('msg')}}
            </div>
        @endif
        @if(@session('error'))
            <div @class('alert alert-danger')>
                {{session('error')}}
            </div>
        @endif

        <a href="{{route('testimonials.create')}}" style="margin-bottom: 15px" class="btn btn-primary">Add new</a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Job</th>
                <th>Testimonials</th>
                <th>Action</th>
            </tr>
            @foreach($lsTesti as $testi)
                <tr>
                    <td>{{$testi->id}}</td>
                    <td>{{$testi->name}}</td>
                    <td>{{$testi->job}}</td>
                    <td>{{$testi->testi}}</td>
                    <td>
                        <form method="POST" onsubmit="return confirm('sure ?')" action="{{route('testimonials.destroy',$testi->id)}}">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


@endsection
