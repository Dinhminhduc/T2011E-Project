@extends('user.front-end')
@section('content')
    <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('img/breadcrumb_bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Dog List</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dog List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- adoption-shop-area -->
    <section class="adoption-shop-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-65">
                        <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                        <h5 class="sub-title">Meet the animals</h5>
                        <h2 class="title">Puppies Waiting for Adoption</h2>
                        <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you
                            with a
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
                                    <li><i class="far fa-calendar-alt"></i> {{$detail->dateOfBirth}}</li>
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
    </section>
    <!-- adoption-shop-area-end -->

    <!-- faq-area -->
    <section class="faq-area-two faq-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="faq-img-wrap">
                        <img src="img/faq_tv.png" class="img-frame" alt="">
                        <img src="img/faq_img.png" class="main-img" alt="">
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
                                        <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            Working for dog adoption
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which
                                        provides you with a breed brwn and ition on provides ancestors most dogs.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                            Competitions & Awards
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which
                                        provides you with a breed brwn and ition on provides ancestors most dogs.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                            The puppies are 3 months old
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which
                                        provides you with a breed brwn and ition on provides ancestors most dogs.
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

    <!-- breeds-services -->
    <section class="breeds-services pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-65">
                        <div class="section-icon"><img src="img/pawprint.png" alt=""></div>
                        <h5 class="sub-title">Service to Breeds</h5>
                        <h2 class="title">Most Popular Dog Breed</h2>
                        <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you
                            with a breed brwn and information Most dogs</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breed-services-active owl-carousel">
                        <div class="breed-services-item">
                            <div class="thumb">
                                <img src="img/breed_services_img01.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3 class="title"><a href="breeder-details.html">Golden Retriever</a></h3>
                            </div>
                        </div>
                        <div class="breed-services-item">
                            <div class="thumb">
                                <img src="img/breed_services_img02.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3 class="title"><a href="breeder-details.html">German Sharped</a></h3>
                            </div>
                        </div>
                        <div class="breed-services-item">
                            <div class="thumb">
                                <img src="img/breed_services_img03.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3 class="title"><a href="breeder-details.html">Siberian Husky</a></h3>
                            </div>
                        </div>
                        <div class="breed-services-item">
                            <div class="thumb">
                                <img src="img/breed_services_img04.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3 class="title"><a href="breeder-details.html">Bernes Mountain</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="breed-services-info" data-background="img/breed_services_bg.jpg">
                        <h5 class="sub-title">Dog Breeder</h5>
                        <h3 class="title">Available for Breed</h3>
                        <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provid dogs</p>
                        <a href="shop.html" class="btn">More Pets <img src="img/w_pawprint.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="breed-services-shape"><img src="img/images/breed_services_shape01.png" alt=""></div>
        <div class="breed-services-shape shape-two"><img src="img/images/breed_services_shape02.png" alt=""></div>
    </section>
    <!-- breeds-services-end -->

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
    <!-- main-area-end -->


@endsection
