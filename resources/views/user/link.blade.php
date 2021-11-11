@section('tag')
<div class="col-lg-4 col-md-8">
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
                    <li>
                        <div class="rc-post-thumb">
                            <a href="blog-details.html"><img src="img/blog/rc_post_thumb01.jpg" alt=""></a>
                        </div>
                        <div class="rc-post-content">
                            <h5 class="title"><a href="blog-details.html">Best Online Pet Everything Your Pet Needs</a></h5>
                            <div class="rc-post-meta">
                                <ul>
                                    <li><i class="far fa-calendar-alt"></i> April 15, 2021</li>
                                    <li>By <a href="#">Admin</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="rc-post-thumb">
                            <a href="blog-details.html"><img src="img/blog/rc_post_thumb02.jpg" alt=""></a>
                        </div>
                        <div class="rc-post-content">
                            <h5 class="title"><a href="blog-details.html">Pet Needs Special Food like Human Foods</a></h5>
                            <div class="rc-post-meta">
                                <ul>
                                    <li><i class="far fa-calendar-alt"></i> October 15, 2021</li>
                                    <li>By <a href="#">Admin</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    
    </aside>
</div>
@endsection