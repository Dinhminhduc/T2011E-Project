@extends('user.front-end')
@section('content')
    <!-- ****** Cart Area Start ****** -->
    <div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <form action="{{route('update_cart')}}" method="POST">
                    {{-- {{route('update_cart')}} --}}
                    @csrf
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>TIME</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                          {{-- @foreach($order as $key => $ser) --}}
                            {{-- @foreach(Cart::content() as $row)
                                <tr>
                                    <td class="cart_product_img d-flex align-items-center">
                                        <h6>{{$row->name}}</h6>
                                    </td>
                                    <td class="price"><span>{{$row->price}}</span></td>
                                    {{-- <td class="date_start">
                                        @if($row->name == 'Nuôi hộ')
                                        <span>{{Carbon\Carbon::parse($ser->date_start)->format('d/m/Y H:i:s')}}
                                            -{{Carbon\Carbon::parse($ser->date_end)->diffForHumans()}}</span> <br>
                                        @else
                                        <span>{{ Carbon\Carbon::parse($ser->date_end)->format('d/m/Y H:i:s')}}</span> 
                                        @endif
                                    </td> --}}

                                      <td class="date_start">
                                       
                                        <span>{{Carbon\Carbon::parse($row->date_start)->format('d/m/Y H:i:s')}}
                                            
                                      
                                    </td>
                                    <td class="qty">
                                        <input type="hidden" class="qty-text" id="rowid"  name="rowid[]" value="{{$row->rowId}}">
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty_{{$row->rowId}}'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="number" class="qty-text" id="qty_{{$row->rowId}}" step="1" min="1" max="99" name="quantity[]" value="{{$row->qty}}">
                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty_{{$row->rowId}}'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                    </td>
                                    <td class="total_price"><span>{{$row->total}}</span></td>
                                </tr>
                            {{-- @endforeach --}}
                      
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="{{url('adoption')}}">Continue shoping</a>
                        </div>
                        <div class="update-checkout w-50 text-right">
                           <a href="{{asset('/clear_cart')}}">Clear Cart</a>

                            <input type="submit" value="Update Cart" class="btn">

                        </div>
                    </div>

                </div>
                </form>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="cart-total-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Cart total</h5>
                            <p>Final info</p>
                        </div>

                        <ul class="cart-total-chart">
                            <li>
                                <span>Subtotal</span>
                                <span>{{Cart::subtotal()}}</span></li>
                            <li><span>Subtotal</span> <span>{{Cart::tax()}}</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span><strong>Total</strong></span> <span><strong>{{Cart::total()}}</strong></span></li>
                        </ul>
                        <a href="{{asset('service_checkout')}}" class="btn karl-checkout-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Cart Area End ****** -->
@endsection
