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
                                <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Adoption</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- breeder-area -->
    <section class="inner-breeder-area breeder-bg">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-4 col-lg-9 col-md-12 col-sm-9">
                    <div class="adoption-content">
                        <h5 class="sub-title">Meet Adoption</h5>
                        <h2 class="title">Work For <span>Adoption</span> Happy Time</h2>
                        <p>The best overall dog DNA test is Embark Breed & Health Kit view at Chewy which pres domesti
                        dog is a sticated descendant.</p>
                        <div class="adoption-list">
                            <ul>
                                <li><i class="flaticon-tick"></i> Embark Breed & Health</li>
                                <li><i class="flaticon-tick"></i> The domestic dog is a domesticated</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-9 col-md-12 col-sm-9">
                    <div class="breeder-info-wrap">
                        <div class="row no-gutters justify-content-center">
                            <div class="col-md-6">
                                <div class="breeder-active owl-carousel">
                                    <div class="breeder-item">
                                        <a href="breeder-details.html">
                                            <img src="{{asset('frontend/img/images/breeder_img01.jpg')}}" alt="">
                                        </a>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="breed-services-info" data-background="{{asset('frontend/img/bg/breed_services_bg.jpg')}}">
                                    <h5 class="sub-title">Dog Adoption</h5>
                                    <h3 class="title">Available for Adoption</h3>
                                    <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which
                                        provid dogs</p>
                                    <a href="dog-list.html" class="btn">More Pets <img src="img/icon/w_pawprint.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="counter-area mt-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="{{$countService}}"></span>+</h2>
                            <p>services</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="{{$countService - $countNotService}}"></span>+</h2>
                            <p> Complete service</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="{{$count_Service}}"></span>+</h2>
                            <p>Service registration</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="{{$count}}"></span>+</h2>
                            <p>Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breeder-area-end -->

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
            <div class="row adopt-active">
               
                @foreach($lsService as $key => $value)
                <div class="col-xl-3">
               
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


</main>
<!-- main-area-end -->

@endsection