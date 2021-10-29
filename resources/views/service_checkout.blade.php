@extends('user.front-end')
@section('content')
<!-- ****** Checkout Area Start ****** -->
<div class="checkout_area section_padding_100">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading">
                        <h5>Billing Address</h5>
                        <p>Enter your cupone code</p>
                    </div>

                    <form action="{{route('place_order')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last Name <span>*</span></label>
                                <input type="text" class="form-control" id="last_name"  name="last_name" value="" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="street_address">Address <span>*</span></label>
                                <input type="text" class="form-control mb-3" id="street_address"  name="address" value="">

                            </div>

                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone No <span>*</span></label>
                                <input type="number" class="form-control" id="phone_number"  name="phone" min="0" value="">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address <span>*</span></label>
                                <input type="email" class="form-control" id="email_address"   name="email" value="">
                            </div>
                            <input  type="submit" class="btn karl-checkout-btn" value="Place Order">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Your Order</h5>
                        <p>The Details</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Product</span> <span>Total</span></li>
                        @foreach(Cart::content() as $row)
                            <li><span>{{$row->name}}</span> <span>{{$row->price}}</span></li>
                        @endforeach
                        <li><span>Subtotal</span><span>{{Cart::subtotal()}}</span></li>
                        <li><span>Shipping</span> <span>Free</span></li>
                        <li><span><strong>Total</strong></span> <span><strong>{{Cart::total()}}</strong></span></li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- ****** Checkout Area End ****** -->

@endsection
