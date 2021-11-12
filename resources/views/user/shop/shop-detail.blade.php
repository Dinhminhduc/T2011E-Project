@extends('user.front-end')
@section('content')

<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Shop Single</h2>
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

    <!-- shop-details-area -->
    <section class="shop-details-area pt-110 pb-50">
        <div class="container">
            <div class="shop-details-wrap">
                <div class="row">
                    <div class="col-7">
                        <div class="shop-details-img-wrap">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane show active" id="item-one" role="tabpanel" aria-labelledby="item-one-tab">
                                    <div class="shop-details-img">
                                        <img src="{{asset($products->image)}}" style="height: 500px; width: 900px" alt="">
                                    </div>
                                </div>
{{--                                @foreach($multiImg as $img)--}}
{{--                                    <div class="tab-pane" id="item-two" role="tabpanel" aria-labelledby="item-two-tab">--}}
{{--                                        <div class="shop-details-img">--}}
{{--                                            <img src="{{asset($img->photo_name)}}" alt="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                                <div class="tab-pane" id="item-two" role="tabpanel" aria-labelledby="item-two-tab">--}}
{{--                                    <div class="shop-details-img">--}}
{{--                                        <img src="{{asset($products->image)}}" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane" id="item-three" role="tabpanel" aria-labelledby="item-three-tab">--}}
{{--                                    <div class="shop-details-img">--}}
{{--                                        <img src="{{asset($products->image)}}" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane" id="item-four" role="tabpanel" aria-labelledby="item-four-tab">--}}
{{--                                    <div class="shop-details-img">--}}
{{--                                        <img src="{{asset($products->image)}}" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="shop-details-nav-wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach($multiImg as $img)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="item-one-tab" data-toggle="tab" href="#item-one" role="tab"
                                       aria-controls="item-one" aria-selected="true"><img src="{{asset($img->photo_name)}}" alt=""></a>
                                </li>
                                @endforeach
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" id="item-two-tab" data-toggle="tab" href="#item-two" role="tab" aria-controls="item-two"--}}
{{--                                       aria-selected="false"><img src="{{asset($products->image)}}" alt=""></a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" id="item-three-tab" data-toggle="tab" href="#item-three" role="tab"--}}
{{--                                       aria-controls="item-three" aria-selected="false"><img src="{{asset($products->image)}}" alt=""></a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" id="item-four-tab" data-toggle="tab" href="#item-four" role="tab"--}}
{{--                                       aria-controls="item-four" aria-selected="false"><img src="{{asset($products->image)}}" alt=""></a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="shop-details-content">
                            <span>hand sanitizer</span>
                            <h2 class="title">{{$products->name}}</h2>
                            <div class="shop-details-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span>( 01 Review )</span>
                            </div>
                            <div class="shop-details-price">
                                <h2 class="price">${{$products->price}}</h2>
                                @if($products->number > 0)
                                <h5 class="stock-status">- AVAILABLE</h5>
                                @endif
                                @if($products->number < 0)
                                    <h5 class="stock-status">- NOT AVAILABLE</h5>
                                @endif
                            </div>
                            {{$products->description}}
                            <br>
                            <div class="shop-details-dimension">
                                <span>Dimension :</span>
                                <ul>
                                    <li class="active"><a href="#">{{$products->size}}</a></li>
                                </ul>
                            </div>
{{--                            <div class="shop-details-color">--}}
{{--                                <span>Color :</span>--}}
{{--                                <ul>--}}
{{--                                    <li class="active"></li>--}}
{{--                                    <li class="black"></li>--}}
{{--                                    <li class="green"></li>--}}
{{--                                    <li class="blue"></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            @if($products->number > 0)
                                <form class="cart" method="post" action="{{route('add_product',$products->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="shop-details-quantity">
                                        <span>Quantity :</span>
                                        <div class="cart-plus-minus">
                                            <input type="text" name="quantity" value="3">
                                        </div>
{{--                                        <a href="shop-details.html" class="wishlist-btn"><i class="fas fa-heart"></i> Add to Wishlist</a>--}}
                                    </div>
                                    <div>
                                        <button type="submit" class="cart-btn btn btn-outline-dark">Add to Cart +</button>
                                    </div>
                                </form>
                            @endif
                            <div class="shop-details-bottom">
                                <ul>
                                    <li class="sd-category">
                                        <span class="title">Categories :</span>
                                        <a href="shop.html">Hand,</a>
                                        <a href="shop.html">Sanitizer,</a>
                                        <a href="shop.html">Covid - 19</a>
                                    </li>
                                    <li class="sd-sku">
                                        <span class="title">SKU :</span>
                                        <a href="shop.html">H#21546</a>
                                    </li>
                                    <li class="sd-share">
                                        <span class="title">Share Now :</span>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-desc-wrap">
                        <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                   aria-controls="details" aria-selected="true">Details More</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="val-tab" data-toggle="tab" href="#val" role="tab" aria-controls="val"
                                   aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                   aria-controls="review" aria-selected="false">Reviews (0)</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContentTwo">
                            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <div class="product-desc-content">
                                    <p>The domestic dog is a doiated dendant of the wolf. The dog derived from an ancient, extinct wolf, and the modern grey wolf is the dog's nearest living relative. The dog was the first species to be domesticated, by hunter–gatherers. These will include the core vaccines, which are administered in a series of three: at 6-, 12-, and 16 weeks old. doiated dendant of the wolf. The dog derived from an ancient, extinct wolf, and the modern grey wolf is the dog's nearest</p>
                                    <p>These will include the core vaccines, which are administered in a series of three: at 6-, 12-, and 16 weeks old. doiated dendant of the wolf. The dog derived from an ancient, extinct wolf, and the modern grey wolf is the dog's nearest include the core vaccines, which are administered.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="val" role="tabpanel" aria-labelledby="val-tab">
                                <div class="product-desc-info">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-5">
                                            <div class="product-desc-img">
                                                <img src="img/product/desc_img.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-md-7">
                                            <h5 class="small-title">100% Knit Knacks</h5>
                                            <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into
                                                electronic typesetting, remaining lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            <ul class="product-desc-list">
                                                <li>65% poly, 35% rayon</li>
                                                <li>Partially lined</li>
                                                <li>Hidden front button closure with keyhole accents</li>
                                                <li>Button cuff sleeves</li>
                                                <li>Lightweight semi-sheer fabrication</li>
                                                <li>Made in USA</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="product-desc-review">
                                    <div class="review-title mb-20">
                                        <h4 class="title">Customer Reviews (0)</h4>
                                    </div>
                                    <div class="left-rc">
                                        <p>No reviews yet</p>
                                    </div>
                                    <div class="right-rc">
                                        <a href="#">Write a review</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="related-products-wrap">--}}
{{--                <h2 class="title">Hot Deals Products</h2>--}}
{{--                <div class="row related-product-active">--}}
{{--                    @foreach($hot_deals as $product)--}}
{{--                    <div class="col-lg-3">--}}
{{--                        <div class="shop-item mb-55">--}}
{{--                            <div class="shop-thumb">--}}
{{--                                <a href="{{route('detail.shop',$product->id)}}"><img src="{{asset($product->image)}}" alt=""></a>--}}
{{--                            </div>--}}
{{--                            <div class="shop-content">--}}
{{--                                <span>{{$product->category}}</span>--}}
{{--                                <h4 class="title"><a href="{{route('detail.shop',$product->id)}}">{{$product->name}}</a></h4>--}}
{{--                                <div class="shop-content-bottom">--}}
{{--                                    <span class="price">${{$product->price}}</span>--}}
{{--                                    <span class="add-cart"><a href="{{route('detail.shop',$product->id)}}">ADD +</a></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
    <!-- shop-details-area-end -->

</main>
<!-- main-area-end -->

@endsection
