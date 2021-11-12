@extends('user.front-end')
@section('content')
<div class="cart_area section_padding_100 clearfix">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="jumbotron text-center ">
                <h1 class="display-3">Thank You!</h1>
                <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
                <hr>
                <p>
                  Having trouble? <a href="">Contact us</a>
                </p>
                <p class="lead">
                    <a href="{{route('all.shop')}}" class="btn btn-outline-dark">Continue Shopping</a>
                </p>
              </div>
            
        </div>
    </div>
</div>
@endsection
