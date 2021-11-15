
<header>
    <div class="header-top-area">
        <div class="container custom-container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="header-top-left">
                        <ul>
                            <li>Call us: 747-800-9880</li>
                            <li><i class="far fa-clock"></i>Opening Hours: 7:00 am - 9:00 pm (Mon - Sun)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="header-top-right">
                        <ul class="header-top-social">
                            <li class="follow">Follow :</li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="menu-area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav show">
                            <div class="logo"><a href=""{{asset('/')}}"><img src="{{asset('frontend/img/logo/logo.png')}}" alt=""></a></div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="active menu-item-has-children"><a href="{{asset('/')}}">Home</a></li>
                                    <li><a href="{{asset('doglist')}}">Dog List</a></li>
                                    <li class="menu-item-has-children"><a href="{{route('all.shop')}}">Shop</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('all.shop')}}">Our Shop</a></li>
{{--                                            <li><a href="{{route('detail.shop')}}">Shop Details</a></li>--}}
                                        </ul>
                                    </li>
                                    <li><a href="{{asset('adoption')}}">Service</a></li>
                                    {{-- <li class="menu-item-has-children"><a href="breeder.html">Breeder</a>
                                        <ul class="submenu">
                                            <li><a href="breeder.html">Our Breeder</a></li>
                                            <li><a href="breeder-details.html">Breeder Details</a></li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li class="menu-item-has-children">
                                        <a href="{{Auth::logout()}}">Login</a>

                                    </li> --}}
                                    <li><a href="contact.html">contacts</a></li>

                                    <li><a href="{{asset('blog')}}">Blog</a></li>
                                    <ul class="navbar-nav ml-auto submenu">
                                        <!-- Authentication Links -->

                                    </ul>

                                </ul>
                            </div>

                            <div class="header-action d-none d-md-block">
                                <ul>
                                    <li class="header-search"><a href="#"><i class="flaticon-search"></i></a></li>
                                    <li class="header-shop-cart"><a href="#"><i class="flaticon-shopping-bag"></i><span>{{Cart::count()}}</span></a>
                                        <ul class="minicart">
                                            @foreach(Cart::content() as $row)
                                                <li class="d-flex align-items-start">
                                                    <div class="cart-img">
                                                        <button><img src="{{asset($row->options->image )}}" alt=""></button>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4><a>{{$row->name}}</a></h4>
                                                        <div class="cart-price">
                                                            <span class="new">${{$row->price}} x {{$row->qty}}</span>
                                                            {{--                                                        <span>Quantity: {{$row->qty}}</span>--}}
                                                        </div>
                                                    </div>
                                                    <div class="del-icon">
                                                        <a href="#"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li>
                                                <div class="total-price">
                                                    <span class="f-left">Total:</span>
                                                    <span class="f-right">${{Cart::total()}}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkout-link">
                                                    <a href="{{route('cart')}}">Shopping Cart</a>
                                                    <a class="black-color" href="{{route('check_out')}}">Checkout</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="header-btn"><a href="adoption.html" class="btn">Adopt Here <img src="{{asset('frontend/img/icon/w_pawprint.png')}}" alt=""></a></li>
                                </ul>
                            </div>

                            <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo"><a href="index.html"><img src="{{asset('frontend/img/logo/logo.png')}}" alt="" title=""></a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
        <div class="header-shape" data-background="{{asset('frontend/img/bg/header_shape.png')}}"></div>
    </div>
    <!-- header-search -->
    <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="search-close">
            <span><i class="fas fa-times"></i></span>
        </div>
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title">... Search Here ...</h2>
                        <div class="search-form">
                            <form action="#">
                                <input type="text" name="search" placeholder="Type keywords here">
                                <button class="search-btn"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-search-end -->
</header>
