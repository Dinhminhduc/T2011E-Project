@extends('user.front-end')
@section('content')

<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('image/product/1714698648111892.jpg)')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Our Shop</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-area -->
    <div class="shop-area pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-8 order-2 order-lg-0">
                    <aside class="shop-sidebar">
                        <div class="widget">
                            <div class="sidebar-search">
                                <form action="#">
                                    <input type="text" placeholder="Search ...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <form method="GET" action="{{asset('product')}}">
                            @csrf
                        <div class="widget">
                            <h4 class="sidebar-title">Category</h4>
                            <div class="shop-cat-list">
                                <ul>
                                    @foreach($lsCate as $cate)
                                    <li><a href="#">{{$cate->name}} <span><input type="checkbox" name="cate" value="{{$cate->id}}"></span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="sidebar-title">Top Brand</h4>
                            <div class="shop-brand-list">
                                <ul>
                                    <li><a href="shop.html">Geco</a></li>
                                    <li><a href="shop.html">Carnation</a></li>
                                    <li><a href="shop.html">Suppke</a></li>
                                    <li><a href="shop.html">WeBeyond</a></li>
                                    <li><a href="shop.html">Edstudy</a></li>
                                </ul>
                            </div>
                        </div>
                            <!-- ============================================== HOT DEALS ============================================== -->

                            <!-- ============================================== HOT DEALS: END ============================================== -->
                            {{--                        <div class="widget">--}}
{{--                            <h4 class="sidebar-title">Filter by Price</h4>--}}
{{--                            <div class="price_filter">--}}
{{--                                <div id="slider-range"></div>--}}
{{--                                <div class="price_slider_amount">--}}
{{--                                    <span>Price :</span>--}}
{{--                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />--}}
{{--                                    <input type="submit" class="btn" value="Search">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        </form>

                        <div class="widget shop-widget-banner">
                            <a href="shop.html"><img src="img/product/shop_add.jpg" alt=""></a>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9">
                    <div class="shop-wrap">
                        <h4 class="title">Shop</h4>
                        <div class="shop-page-meta mb-30">
                            <div class="shop-grid-menu">
                                <ul>
                                    <li class="active"><a href="#"><i class="fas fa-th"></i></a></li>
                                    <li><a href="#"><i class="fas fa-list"></i></a></li>
                                </ul>
                            </div>
                            <div class="shop-showing-result">
                                <p>Total Items 1-12 of 13</p>
                            </div>
                            <div class="shop-show-list">
                                <form action="#">
                                    <label for="show">Show</label>
                                    <select id="show" class="selected">
                                        <option value="">08</option>
                                        <option value="">12</option>
                                        <option value="">16</option>
                                        <option value="">18</option>
                                        <option value="">20</option>
                                    </select>
                                </form>
                            </div>
                            <div class="shop-short-by">
                                <form action="#">
                                    <label for="shortBy">Sort By</label>
                                    <select id="shortBy" class="selected">
                                        <option value="">Sort by latest</option>
                                        <option value="">Low to high</option>
                                        <option value="">High to low</option>
                                        <option value="">Popularity</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="row justify-content-center">

                            @foreach($lsProduct as $pro)
                            <div class="col-lg-4 col-sm-6">
                                <div class="shop-item mb-55">
                                    <div class="shop-thumb">
                                        <a href="{{route('detail.shop',$pro->id)}}"><img src="{{asset($pro->image)}}" alt=""></a>
                                    </div>
                                    <div class="shop-content">
                                        <span>Dog toy’s</span>
                                        <h4 class="title"><a href="{{route('detail.shop',$pro->id)}}">{{$pro->name}}</a></h4>
                                        <div class="shop-content-bottom">
                                            <span class="price">${{$pro->price}}</span>
                                            <span class="add-cart"><a href="{{route('detail.shop',$pro->id)}}">ADD +</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="shop-page-meta">
                            <div class="shop-grid-menu">
                                <ul>
                                    <li class="active"><a href="#"><i class="fas fa-th"></i></a></li>
                                    <li><a href="#"><i class="fas fa-list"></i></a></li>
                                </ul>
                            </div>
                            <div class="shop-showing-result">
                                <p>Total Items 1-12 of 13</p>
                            </div>
                            <div class="shop-show-list">
                                <form action="#">
                                    <label for="bottomShow">Show</label>
                                    <select id="bottomShow" class="selected">
                                        <option value="">08</option>
                                        <option value="">12</option>
                                        <option value="">16</option>
                                        <option value="">18</option>
                                        <option value="">20</option>
                                    </select>
                                </form>
                            </div>
                            <div class="shop-pagination">
                                <ul>
                                    <li class="active"><a href="shop.html">1</a></li>
                                    <li><a href="shop.html">2</a></li>
                                    <li><a href="shop.html"><i class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-area-end -->

</main>
<!-- main-area-end -->
@endsection
