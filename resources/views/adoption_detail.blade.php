@extends('user.front-end')
@section('content')
  <!-- main-area -->
  <main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('frontend/img/bg/breadcrumb_bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Service Details</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Service</li>
                                <li class="breadcrumb-item active" aria-current="page">{{$service->name_service}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- breeder-details-area -->
    <section class="breeder-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="breeder-details-content">
                        <h4 class="title">{{$service->servicetype->name}}</h4>
                        <p>{!!$service->title!!}</p>
                        {{-- <div class="breeder-details-img">
                            <img src="{{asset("img/service-img/{$service->hinhanh}") }}" alt=""></a>
                        </div> --}}
                      </div>
                </div>
                <div class="col-lg-4">
                    <aside class="breeder-sidebar">
                        <div class="widget breeder-widget">
                            <div class="breeder-widget-title mb-20">
                                <h5 class="title">Service Yourself</h5>
                            </div>
                            
                           
                            <form action="{{route('add_adoption',$service->id)}}}" method="post" class="sidebar-find-pets">
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
                                  
                                </div>
                                
                            
                                <button type="submit" name="addtocart" value="5" class="btn cart-submit d-block">Add to cart</button>
                            </form>
                                
                                  
                              
                                    {{-- <a href="{{asset("add_adoption/$service->id")}}" class="btn">Apply Today 
                                        <img src="img/icon/w_pawprint.png" alt=""></a> --}}
                                
                        </div>
                        <div class="widget">
                            
                                <div class="contact-info-wrap">
                                    <div class="contact-img">
                                        <img src="img/images/contact_img.png" alt="">
                                    </div>
                                    <div class="contact-info-list">
                                        <div class="breeder-dog-info">
                                            <h5 class="title">Service Information</h5>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="breeder-info-item">
                                                        <h6>Invoice:</h6>
                                                        <span>  
                                                        @if( $service->servicetype->name == 'Chăm sóc')
                                                            {{$service->price}} - {{$service->price_end}}
                                                        @elseif ($service->servicetype->name == 'Trông coi')
                                                            {{$service->price}} - {{$service->price_end}}(giờ)
                                                        @else
                                                            {{$service->price}} - {{$service->price_end}}(chưa tính phụ phí)
                                                        @endif</span>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4 col-sm-4 col-6">
                                                    <div class="breeder-info-item">
                                                        <h6>Staff:</h6>
                                                        <span>{{$service->staff->chucvu}}</span>
                                                    </div>
                                                </div> --}}
                
                                                <div class="col-md-12">
                                                    <div class="breeder-info-item">
                                                        <h6>Service:</h6>
                                                        <span>{!!$service->tomtat!!}</span>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    
                                        <ul>
                                            <li>
                                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                                <div class="content">
                                                    <p>W84 New Park Lan, New York, NY 4586 United States</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                                <div class="content">
                                                    <p>+9 (256) 254 9568</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fas fa-envelope-open"></i></div>
                                                <div class="content">
                                                    <p>Contact@ info.com</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="contact-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                             
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- breeder-details-area-end -->

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

    <!-- adoption-area -->
    <section class="adoption-area-two pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-65">
                        <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
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
                            <a href="{{asset("adoption_detail/$value->id")}}">
                                <img src="{{asset("img/service-img/{$value->hinhanh}") }}" alt=""></a>
                                {{-- <span class="status">Ảnhminhhoạ</span> --}}
                        </div>
                        <div class="adopt-content">
                            <div class="adopt-date"><i class="far fa-calendar-alt"></i>
                                @if( $value->servicetype->name == 'Chăm sóc')
                                    {{$value->price}} - {{$value->price_end}}
                                @elseif ($value->servicetype->name == 'Trông coi')
                                    {{$value->price}} - {{$value->price_end}} (giờ)
                                @else
                                    {{$value->price}} - {{$value->price_end}} (chưa tính phụ phí)
                                @endif
                            </div>
                            <h3 class="title"><a href="{{asset("adoption_detail/$value->id")}}">{{$value->name_service}}</a></h3>
                            <p>{!!$value->tomtat!!}.</p>
                            <a href="{{asset("adoption_detail/$value->id")}}" class="read-more">Read More 
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