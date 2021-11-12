@extends('user.front-end')
@section('content')
@if(session('msg'))
        <div @class("alert alert-success")>
            {{session("msg")}}
        </div>
        @endif

        @if(session("error"))
        <div @class("alert alert-error")>
            {{session("error")}}
        </div>
        @endif
<section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/Contact-Us.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="title" style="margin-bottom: 200px">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</section>
         
    <!-- contact-area -->
    <section class="contact-area pt-110 pb-110">
        <div class="container">
            <div class="container-inner-wrap">
                <div class="row justify-content-center justify-content-lg-between">
                    <div class="col-lg-6 col-md-8 order-2 order-lg-0">
                        <div class="contact-title mb-20">
                            <h5 class="sub-title">Contact Us</h5>
                            <h2 class="title">Let's Talk Question<span>.</span></h2>
                        </div>
                        <div class="contact-wrap-content">
                            <p>The domestic dog is a doiated dendant of the wolf. The dog derived from an ancient, extinct wolf, and the modern grey.</p>
                            <form action="{{route('contact_save')}}" method="POST" class="contact-form" >
                                @csrf
                                <div class="form-grp">
                                    <label for="name">Your Name <span>*</span></label>
                                    <input type="text" name="name" placeholder="Jon Deo...">
                                </div>
                                <div class="form-grp">
                                    <label for="email">Your Email <span>*</span></label>
                                    <input type="email" name="email" placeholder="info.example@.com">
                                </div>
                                <div class="form-grp">
                                    <label for="message">Your Message <span>*</span></label>
                                    <textarea name="message" id="message" placeholder="Opinion..."></textarea>
                                </div>
                                <div class="form-grp checkbox-grp">
                                    <input type="checkbox" id="checkbox">
                                    <label for="checkbox">Don’t show your email address</label>
                                </div>
                                <input type="submit" class="btn rounded-btn" value="Send Now"/>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="contact-info-wrap">
                            <div class="contact-img">
                                <img src="img/images/contact_img.png" alt="">
                            </div>
                            <div class="contact-info-list">
                                <ul>
                                    <li>
                                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="content">
                                            <p>Ton That Thuyet</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                        <div class="content">
                                            <p>+84 123456789</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fas fa-envelope-open"></i></div>
                                        <div class="content">
                                            <p>admin@gmail.com</p>
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
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

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

    <!-- main-area-end -->

@endsection