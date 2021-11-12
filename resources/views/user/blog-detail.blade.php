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
                        <h2 class="title">Blog Single</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Single</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-details-area -->
    <section class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="standard-blog-item mb-50">
                        <div class="standard-blog-thumb">
                            <img src="img/blog/blog_thumb01.jpg" alt="">
                        </div>
                        <div class="standard-blog-content blog-details-content">
                            <div class="blog-post-meta">
                                <ul>
                                    <li class="tags"><i class="flaticon-bookmark-1"></i>
                                        <a href="#">Siberian Husky , </a>
                                      
                                    </li>
                                    <li><i class="far fa-user"></i><a href="#">{{$blog->name}}</a></li>
                                    <li><i class="far fa-bell"></i> {{$blog->created_at}}</li>
                                </ul>
                            </div>
                            <h4 class="title">{{$blog->title}}</h4>
                            <p>{!!$blog->description!!}</p>
                           
                            <div class="blog-details-bottom">
                                <div class="blog-details-tags">
                                    <ul>
                                        <li class="title"><i class="fas fa-tags"></i> Tags :</li>
                                        @php
                                        $tukhoa = explode(",",$blog->tukhoa);
                                        // print_r($tukhoa);
                                        @endphp
                                         <div class="tagcloud05">
                                            <ul>
                                              @foreach($tukhoa as $key=> $tu)
                                              <li><a href="{{url('tag/'.\Str::slug($tu))}}"><span>{{$tu}}</span></a></li>
                                              @endforeach
                                            </ul>
                                          </div>
                                    </ul>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                  
                    <div class="blog-next-prev">
                        <ul>
                            <li class="blog-prev">
                                <a class="{{$blog->id==$min_id->id ?'isDis' :''}}"
                                 href="{{url('blog-detail/'.$next_blog)}}">
                                    <img src="{{asset('frontend/img/icon/left_arrow.png')}}" alt="img">Previous Post</a>
                            </li>
                            <li class="blog-next">
                                <a class="{{$blog->id==$max_id->id ?'isDis' :''}}"
                                 href="{{url('blog-detail/'.$prev_blog)}}">Next Post
                                    <img src="{{asset('frontend/img/icon/right_arrow.png')}}" alt="img"></a>
                            </li>
                            <style>
                              .isDis {
                                pointer-events:none; 
                               opacity:0.5; 
                               text-decoration:none;
                              }
                            </style>
                        </ul>
                    </div>
                 
                </div>
                <div class="col-lg-4">
                    <aside class="blog-sidebar">
                     
                        
                        <div class="widget">
                            <h4 class="sidebar-title">Recent Post</h4>
                            <div class="rc-post-list">
                                <ul>
                                 @foreach ($blogs as $blog)
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="{{asset("blog-detail/$blog->slug")}}"><img src="{{asset("img/blog-img/{$blog->hinhanh}") }}" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h5 class="title"><a href="{{asset("blog-detail/$blog->slug")}}">{{$blog->title}}</a></h5>
                                            <div class="rc-post-meta">
                                                <ul>
                                                    <li><i class="far fa-calendar-alt"></i> {{$blog->created_at}}</li>
                                                    <li>By <a href="#">{{$blog->name}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                   
                                 
                                </ul>
                            </div>
                        </div>
                       
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->

</main>
<!-- main-area-end -->

@endsection