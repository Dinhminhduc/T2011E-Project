@extends('user.front-end')
@section('content')

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Cart</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

{{--    Main Cart Start--}}
        <div class="col-md-12">
            <form action="{{route('update_cart')}}" method="post">
                @csrf
            <h1>All Product</h1>
            <div class="card" style="width: auto; ">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Image</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $row)
                        <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->name}}</td>
                            <td>${{$row->price}}</td>
                            <td>
                                <input type="hidden" class="qty-text" id="rowid" name="rowid[]" value="{{$row->rowId}}">
                                <div class="cart-plus-minus">
                                    <input type="text" name="quantity[]" value="{{$row->qty}}">
                                </div>
                            </td>
                            <td><img src="{{asset($row->options->image)}}" style="height:80px; width: 100px;"></td>
                            <td>${{$row->total}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 20px; margin-left: 55rem">
                <a href="{{route('all.shop')}}" class="btn btn-outline-dark">Continue Shopping</a>
                <a href="{{route('clear_cart')}}" onclick="return confirm('Are you sure ?')" class="btn btn-outline-dark">Clear Cart</a>
                <input type="submit" class="btn btn-outline-dark" value="Update Cart">
            </div>
            </form>
        </div>

{{--    Main cart End--}}

@endsection
