@extends('user.front-end')
@section('content')
    <main>
        <!-- slider-area -->
        <section class="slider-area">
            <div class="slider-active">
                <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('img/bg/s_slider_bg01.jpg')}}">
                    <div class="container custom-container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-10">
                                <div class="slider-content">
                                    <div class="slider-title">
                                        <h2 class="title" data-animation="fadeInUpBig" data-delay=".2s" data-duration="1.2s">Best Friend <span>with</span> Happy Time</h2>
                                    </div>
                                    <div class="slider-desc">
                                        <p class="desc" data-animation="fadeInUpBig" data-delay=".4s" data-duration="1.2s">Human Shampoo on Dogs After six days of delirat, the jury found Hernandez guilty of first-degree murder</p>
                                    </div>
                                    <a href="{{asset('doglist')}}" class="btn" data-animation="fadeInUpBig" data-delay=".6s" data-duration="1.2s">View More <img src="img/icon/w_pawprint.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="slider-shape"><img src="img/slider/slider_shape01.png" alt=""></div>
            <div class="slider-shape shape-two"><img src="img/slider/slider_shape02.png" alt=""></div>
        </section>
        <!-- slider-area-end -->

        <!-- find-area -->
        <div class="find-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="find-wrap">
                                <div class="location">
                                    <i class="flaticon-location"></i>
                                    <input type="text" value="Enter City, State. or Zip">
                                </div>
                                <div class="find-category">
                                    <ul>
                                        <li><a href="shop.html"><i class="flaticon-dog"></i> Find Your Dog</a></li>
                                        <li><a href="shop.html"><i class="flaticon-happy"></i> Find Your Cat</a></li>
                                        <li><a href="shop.html"><i class="flaticon-dove"></i> Find Your Birds</a></li>
                                    </ul>
                                </div>
                                <div class="other-find">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Find Other Pets
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="shop.html">Find Your Dog</a>
                                            <a class="dropdown-item" href="shop.html">Find Your Cat</a>
                                            <a class="dropdown-item" href="shop.html">Find Your Birds</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- find-area-end -->

        <!-- counter-area -->
        <section class="counter-area counter-bg" data-background="img/bg/counter_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="counter-title text-center mb-65">
                            <h6 class="sub-title">Why Choose Us?</h6>
                            <h2 class="title">Best Service to Breeds Your Loved Dog Explore</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="73"></span>%</h2>
                            <p>dogs are first bred</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="259"></span>+</h2>
                            <p>Most dogs are first</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="39"></span>K</h2>
                            <p>Dog Breeding</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="45"></span>+</h2>
                            <p>Years Of History</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter-area-end -->

        <!-- breeds-services -->
        <section class="breeds-services pt-110 pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-65">
                            <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                            <h5 class="sub-title">Product Hot Deals</h5>
                            <h2 class="title">Most Popular Dog Breed</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a breed brwn and information Most dogs</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breed-services-active owl-carousel">
                            @foreach($lsHot_deals as $hot)
                            <div class="breed-services-item">
                                <div class="thumb">
                                    <img src="{{$hot->image}}" alt="">
                                </div>
                                <div class="content">
                                    <h3 class="title"><a href="{{route('all.shop')}}">{{$hot->name}}</a></h3>
                                </div>
                            </div>
                            @endforeach
{{--                            <div class="breed-services-item">--}}
{{--                                <div class="thumb">--}}
{{--                                    <img src="{{asset('img/images/breed_services_img02.jpg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <h3 class="title"><a href="breeder-details.html">German Sharped</a></h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="breed-services-item">--}}
{{--                                <div class="thumb">--}}
{{--                                    <img src="{{asset('img/images/breed_services_img03.jpg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <h3 class="title"><a href="breeder-details.html">Siberian Husky</a></h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="breed-services-item">--}}
{{--                                <div class="thumb">--}}
{{--                                    <img src="{{asset('img/images/breed_services_img04.jpg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <h3 class="title"><a href="breeder-details.html">Bernes Mountain</a></h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="breed-services-info" data-background="{{asset('img/bg/breed_services_bg.jpg')}}">
                            <h5 class="sub-title">Dog Breeder</h5>
                            <h3 class="title">Available for Breed</h3>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provid dogs</p>
                            <a href="dog-list.html" class="btn">More Pets <img src="img/icon/w_pawprint.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breed-services-shape"><img src="img/images/breed_services_shape01.png" alt=""></div>
            <div class="breed-services-shape shape-two"><img src="img/images/breed_services_shape02.png" alt=""></div>
        </section>
        <!-- breeds-services-end -->

        <!-- faq-area -->
        <section class="faq-area faq-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="faq-img-wrap">
                            <img src="{{asset('img/images/faq_tv.png')}}" class="img-frame" alt="">
                            <img src="{{asset('img/images/faq_img.png')}}" class="main-img" alt="">
                            <a href="https://www.youtube.com/watch?v=XdFfCPK5ycw" class="popup-video"></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-wrapper">
                            <div class="section-title mb-35">
                                <h5 class="sub-title">FAQ Question</h5>
                                <h2 class="title">History & Family Adoption</h2>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Working for dog adoption
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which provides you with a breed brwn and ition on provides ancestors most dogs.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Competitions & Awards
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which provides you with a breed brwn and ition on provides ancestors most dogs.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                The puppies are 3 months old
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which provides you with a breed brwn and ition on provides ancestors most dogs.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-shape"><img src="img/images/faq_shape.png" alt=""></div>
        </section>
        <!-- faq-area-end -->

        <!-- brand-area -->
        <div class="brand-area pt-80 pb-80">
            <div class="container">
                <div class="row brand-active">
                    @foreach($lsBrands as $brand)
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="{{$brand->brand_image}}" alt="img">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- adoption-shop-area -->
        <section class="adoption-shop-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-65">
                            <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                            <h5 class="sub-title">Meet the animals</h5>
                            <h2 class="title">Puppies Waiting for Adoption</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a
                                breed brwn and information Most dogs</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($lsDetail as $detail)
                    <div class="col-lg-4 col-md-6">
                        <div class="adoption-shop-item">
                            <div class="adoption-shop-thumb">
                                <img src="{{asset($detail->img)}}" alt="">
                                <a href="shop-details.html" class="btn">Adoption <img src="img/w_pawprint.png" alt=""></a>
                            </div>
                            <div class="adoption-shop-content">
                                <h4 class="title"><a href="shop-details.html">{{$detail->name}}</a></h4>
                                <div class="adoption-meta">
                                    <ul>
                                        <li><i class="fas fa-cog"></i><a href="#">{{$detail->Animal_type->name}}</a></li>
                                        <li><i class="far fa-calendar-alt"></i> Birth : {{$detail->dateOfBirth}}</li>
                                    </ul>
                                </div>
                                <div class="adoption-rating">
                                    <ul>
                                        <li class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="price">Total Price : <span>${{$detail->price}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- adoption-shop-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area testimonial-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-65">
                            <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                            <h5 class="sub-title">Testimonials</h5>
                            <h2 class="title">Our Happy Customers</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a
                                breed brwn and information Most dogs</p>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-active">
                    @foreach($lsTesti as $testi)
                        <div class="col-lg-6">
                            <div class="testimonial-item">

                                <div class="testi-content">
                                    <p>{{$testi->testi}}</p>
                                    <div class="testi-avatar-info">
                                        <h5 class="title">{{$testi->name}}</h5>
                                        <span>{{$testi->job}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- blog-area -->
        <section class="blog-area pt-110 pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-65">
                            <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                            <h5 class="sub-title">Our News</h5>
                            <h2 class="title">Latest News Update</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a
                                breed brwn and information Most dogs</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($lsStaff as $staff)
                    @if($staff->kichhoat == 0 )
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item mb-50">
                            <div class="blog-post-thumb">
                                <a href=""><img src="{{asset("img/staff-img/{$staff->hinhanh}") }}" alt=""></a>
                                <div class="blog-post-tag">
                                    <a href="#"><i class="flaticon-bookmark-1"></i>{{$staff->chucvu}}</a>
                                </div>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-meta">
                                    <ul>
                                        <li><i class="far fa-user"></i><a href="#">{{$staff->ten}}</a></li>
                                        <li><i class="far fa-bell"></i>{{$staff->ngaysinh}}</li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="">{{$staff->chitiet}}</a></h3>
                                <p>{{$staff->title}}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach


                </div>
            </div>
        </section>
        <!-- blog-area-end -->

        <!-- newsletter-area -->
        <div class="newsletter-area pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="newsletter-wrap">
                            <div class="newsletter-content">
                                <h2 class="title">Newsletter For</h2>
                                <p><span>*</span> Do Not Show Your Email.</p>
                            </div>
                            <div class="newsletter-form">
                                <form action="#">
                                    <input type="email" placeholder="Enter Your Email...">
                                    <button type="submit" class="btn">Subscribe</button>
                                </form>
                            </div>
                            <div class="newsletter-shape"><img src="img/images/newsletter_shape01.png" alt=""></div>
                            <div class="newsletter-shape shape-two"><img src="img/images/newsletter_shape02.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter-area-end -->

    </main>


    @endsection
