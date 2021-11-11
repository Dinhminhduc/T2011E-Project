@extends('user.front-end')
@section('content')

   <!-- main-area -->
   <main>
    <form action="{{asset('blog')}}" method="GET" >
        @csrf
          <!-- breadcrumb-area -->
          <section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Our Blog</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- blog-area -->
        <section class="standard-blog-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @foreach ($blogs as $blog)
                        <div class="standard-blog-item">
                            <div class="standard-blog-thumb">
                                <a href="{{asset("blog-detail/$blog->slug")}}"><img src="{{asset("img/blog-img/{$blog->hinhanh}") }}" alt=""></a>
                            </div>
                            <div class="standard-blog-content">
                                <div class="blog-post-meta">
                                    <ul>
                                        <li class="tags"><i class="flaticon-bookmark-1"></i>
                                            <a href="#">Siberian Husky , </a>
                                          
                                        </li>
                                        <li><i class="far fa-user"></i><a href="#">{{$blog->name}}</a></li>
                                        <li><i class="far fa-bell"></i>{{$blog->created_at}}</li>
                                    </ul>
                                </div>
                                <h2 class="title"><a href="{{asset("blog-detail/$blog->slug")}}">{{$blog->title}}</a></h2>
                                <p>{!!$blog->tomtat!!}</p>
                                <a href="{{asset("blog-detail/$blog->slug")}}" class="read-more">Read More <img src="img/icon/pawprint.png" alt=""></a>
                            </div>
                        </div>
                        @endforeach
                     
                    </div>
                    <div class="col-lg-4">
                        <aside class="blog-sidebar">
                            <div class="widget">
                                <h4 class="sidebar-title">Search</h4>
                                <div class="sidebar-search">
                                    <form action="#">
                                        <input type="text" placeholder="Search ...">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="sidebar-title">Categories</h4>
                                <div class="sidebar-cat-list">
                                    <ul>
                                        <li><a href="#">Siberian Husky <i class="fas fa-angle-double-right"></i></a></li>
                                        <li><a href="#">German Sherped <i class="fas fa-angle-double-right"></i></a></li>
                                        <li><a href="#">French Bulldog <i class="fas fa-angle-double-right"></i></a></li>
                                        <li><a href="#">Golden Retriever <i class="fas fa-angle-double-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
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
        <!-- blog-area-end -->
    
    </main>

@endsection;