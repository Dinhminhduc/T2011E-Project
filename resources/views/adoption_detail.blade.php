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

                                    <div class="col-12 mb-4">
                                        <label for="email_address">Expected Date <span>*</span></label>
                                        <input type="datetime-local" class="form-control" id="date" name="date_time" value="{{date('Y-m-d H:i')}}">
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
                                                            {{$service->price}} - {{$service->price_end}}(ngày)
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
                @if($service->id != $value->id)
                    <div class="col-xl-3">
                        <div class="adoption-item">
                            <div class="adopt-thumb" >
                                <a href="{{asset("adoption-detail/$value->slug")}}">
                                    <img src="{{asset("img/service-img/{$value->hinhanh}") }}" alt=""></a>
                                    {{-- <span class="status">Ảnhminhhoạ</span> --}}
                            </div>
                            <div class="adopt-content">
                                <div class="adopt-date"><i class="far fa-calendar-alt"></i>
                                    @if( $value->servicetype->name == 'Chăm sóc')
                                        {{$value->price}} - {{$value->price_end}}
                                    @elseif ($value->servicetype->name == 'Trông coi')
                                        {{$value->price}} - {{$value->price_end}} (ngày)
                                    @else
                                        {{$value->price}} - {{$value->price_end}} (chưa tính phụ phí)
                                    @endif
                                </div>
                                <h3 class="title"><a href="{{asset("adoption_detail/$value->id")}}">{{$value->name_service}}</a></h3>
                                <p>{!!$value->tomtat!!}</p>
                                <a href="{{asset("adoption-detail/$value->slug")}}" class="read-more">Read More 
                                    <img src=" {{asset('frontend/img/icon/pawprint.png')}}"
                                    alt=""></a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>


        <div class="container" style="margin-top:50px">
            <h1>Service Reviews</h1>
            <div id="disqus_thread"></div>
        </div>
    </section>
    
    <!-- adoption-area-end -->


    {{-- <div class="container-fluid px-0 py-5 mx-auto">
        <div class="row justify-content-center mx-0 mx-md-auto">
            <div class="col-lg-10 col-md-11 px-1 px-sm-2">
                <div class="card border-0 px-3">
                    <!-- top row -->
                    <h3>Write Your Review</h3>
                    <div class="d-flex row py-5 px-5 bg-light">
                      
                       <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputAddress"></label>
                              <textarea></textarea>
                            </div>
                        </div>
                       
                      </form>
                        <div class="ml-md-auto p-2 mx-md-2 pt-4 pt-md-3">
                             <button class="btn btn-red px-4">WRITE A REVIEW</button>
                        </div>
                    </div> <!-- middle row -->

                    <div id="disqus_thread"></div>

                   <form>
                       @csrf
                       <input type="hidden" name="comment_service_id" class="comment_service_id" value="{{$value->id}}">
                        <div id="comment_show"></div>
                    
                        <div class="review p-5" style="margin-top:-30px">
                            <div class="row d-flex">
                                <div class="d-flex flex-column pl-3">
                                    <h4>Emily</h4>
                                    <p class="grey-text">30 min ago</p>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <p>This dive center is incredibly well organized and is at the top of its game.</p>
                            </div>
                        
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div> --}}

    
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://http-t2001eproject-abc-81.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>

</main>

<script id="dsq-count-scr" src="//http-t2001eproject-abc-81.disqus.com/count.js" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- main-area-end -->
<script type="text/javascript">
    $(document).ready(function(){
       load_comment();
        // alert(service_id);
        function load_comment(){
            var _token = $('input[name="token"]').val();
             var service_id = $('.comment_service_id').val();
            $.ajax({
                url:{{url('load-comment')}},
                method: 'POST',
                data:{service_id:service_id, _token:_token},
                success:function(data){
                    
                    $('#comment_show').html(data);
                }
            });
        }
    });
</script>
 <style>

/* .container-fluid {
    background-image: linear-gradient(to right, #7B1FA2, #E91E63)
} */

.sm-text {
    font-size: 10px;
    letter-spacing: 1px
}

.sm-text-1 {
    font-size: 14px
}

.green-tab {
    background-color: #00C853;
    color: #fff;
    border-radius: 5px;
    padding: 5px 3px 5px 3px
}

.btn-red {
    background-color: #E64A19;
    color: #fff;
    border-radius: 20px;
    border: none;
    outline: none
}

.btn-red:hover {
    background-color: #BF360C
}

.btn-red:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.round-icon {
    font-size: 40px;
    padding-bottom: 10px
}

.fa-circle {
    font-size: 10px;
    color: #EEEEEF
}

.green-dot {
    color: #4CAF50
}

.red-dot {
    color: #E64A19
}

.yellow-dot {
    color: #FFD54F
}

.grey-text {
    color: #BDBDBD
}

.green-text {
    color: #4CAF50
}

.block {
    border-right: 1px solid #F5EEEE;
    border-top: 1px solid #F5EEEE;
    border-bottom: 1px solid #F5EEEE
}

.profile-pic img {
    border-radius: 50%
}

.rating-dot {
    letter-spacing: 5px
}

.via {
    border-radius: 20px;
    height: 28px
}
 </style>

@endsection