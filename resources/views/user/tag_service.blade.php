@extends('user.front-end')
@section('content')

   <!-- main-area -->
   <main>
    <form action="{{asset('adoption')}}" method="GET" >
        @csrf
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('frontend/img/slider/slider_bg01.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Get Adoption</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Adoption</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- adoption-area -->
    <section class="adoption-area-two pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-65">
                        <div class="section-icon"><img src="{{asset('frontend/img/icon/pawprint.png')}}" alt=""></div>
                        <h5 class="sub-title">Meet the animals</h5>
                        <h2 class="title">Puppies Waiting for Adoption</h2>
                        <p>The best overall dog DNA test is Embark Breed &amp; Health Kit (view at Chewy), which provides
                            you with a breed brwn and information most dogs</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container custom-container">
            <h2>Từ khoá tìm kiếm: {{$tag}}</h2>
            <div class="row adopt-active">
               
                @foreach ($service_tag as $key=>$value)
                <div class="col-xl-3 col-lg-6 col-xl-12">
               
                    <div class="adoption-item">
                        <div class="adopt-thumb" >
                            <a href="{{asset("adoption-detail/$value->slug")}}">
                                <img src="{{asset("img/service-img/{$value->hinhanh}") }}" alt=""></a>
                                {{-- <span class="status">Ảnhminhhoạ</span> --}}
                        </div>
                        <div class="adopt-content">
                            <div class="adopt-date"><i class="fas fa-money-check"></i>
                                @if( $value->servicetype->name == 'Chăm sóc')
                                    {{$value->price}} - {{$value->price_end}}
                                @elseif ($value->servicetype->name == 'Trông coi')
                                    {{$value->price}} - {{$value->price_end}} (ngày)
                                @else
                                    {{$value->price}} - {{$value->price_end}} (chưa tính phụ phí)
                                @endif
                            </div>
                            <h3 class="title"><a href="{{asset("adoption_detail/$value->slug")}}">{{$value->name_service}}</a></h3>
                            <p>{!!$value->tomtat!!}</p>
                            <a href="{{asset("adoption-detail/$value->slug")}}" class="read-more">Read More 
                                <img src=" {{asset('frontend/img/icon/pawprint.png')}}"
                                alt=""></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- adoption-area-end -->

    <!-- faq-area -->
    <section class="faq-area faq-two-bg">
        <div class="faq-two-img"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-6">
                    <div class="faq-wrapper">
                        <div class="section-title white-title mb-35">
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

    <!-- breeder-gallery-area -->
    <section class="breeder-gallery-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-0 order-lg-2">
                    <div class="breeder-gallery-active">
                        <div class="breeder-gallery-item">
                            <img src="img/images/breeder_gallery01.jpg" alt="">
                        </div>
                        <div class="breeder-gallery-item">
                            <img src="img/images/breeder_gallery02.jpg" alt="">
                        </div>
                        <div class="breeder-gallery-item">
                            <img src="img/images/breeder_gallery03.jpg" alt="">
                        </div>
                        <div class="breeder-gallery-item">
                            <img src="img/images/breeder_gallery04.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="adoption-content">
                        <h5 class="sub-title">Meet Adoption</h5>
                        <h2 class="title">Working For <span>Adoption</span> <br> Happy Time</h2>
                        <p>The best overall dog DNA test is Embark Breed & Health Kit view at Chewy which provides domestic dog is a sticated
                        descendant of the wolf. The dog derived from an ancient.</p>
                        <div class="adoption-list">
                            <ul>
                                <li><i class="flaticon-tick"></i> Embark Breed & Health</li>
                                <li><i class="flaticon-tick"></i> The domestic dog is a domesticated</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breeder-gallery-area-end -->

</main>
<!-- main-area-end -->

@endsection;