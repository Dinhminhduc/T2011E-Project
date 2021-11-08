@@ -168,6 +168,166 @@
    </section>
    <!-- breeder-details-area-end -->


    {{-- comment --}}
    <div class="container" style="margin-top:50px">
        <h1>Service Reviews</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
         
                 <!-- Start comment-sec Area -->
            <section class="comment-sec-area pt-80 pb-80">
                <div class="container">
                  <div class="row flex-column">
                    <h5 class="text-uppercase pb-80">{{$service->comments->count()}} Comments</h5>
                    <br />
                  @foreach ($service->comments as $comment)
                  <div class="comment">
                        <div class="comment-list">
                          <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                              {{-- <div class="thumb">
                                <img src="{{asset('storage/user/'.$comment->user->image)}}" alt="{{$comment->user->image}}" width="50px">
                              </div> --}}
                              <div class="desc">
                                <h5><a href="#">{{$comment->user->name}}</a></h5>
                                <p class="date">{{$comment->created_at->format('D, d M Y H:i')}}</p>
                                <p class="comment">
                                  {{$comment->comment}}
                                </p>
                              </div>
                            </div>
                            <div class="">
                              <button class="btn-reply text-uppercase" id="reply-btn"
                                onclick="showReplyForm('{{$comment->id}}','{{$comment->user->name}}')">reply</button
                              >
                            </div>
                          </div>
                        </div>
                      @if($comment->replies->count() > 0)
                        @foreach ($comment->replies as $reply)
                        <div class="comment-list left-padding">
                          <div
                            class="single-comment justify-content-between d-flex"
                          >
                            <div class="user justify-content-between d-flex">
                              {{-- <div class="thumb">
                                <img src="{{asset('storage/user/'.$reply->user->image)}}" alt="{{$reply->user->image}}" width="50px"/>
                              </div> --}}
                              <div class="desc">
                                <h5><a href="#">{{$reply->user->name}}</a></h5>
                                <p class="date">{{$reply->created_at->format('D, d M Y H:i')}}</p>
                                <p class="comment">
                                  {{$reply->message}}
                                </p>
                              </div>
                            </div>
                            <div class="">
                              <button class="btn-reply text-uppercase" id="reply-btn"
                                onclick="showReplyForm('{{$comment->id}}','{{$reply->user->name}}')">reply</button
                              >
                            </div>
                          </div>
                        </div>
  
                        @endforeach
                      @else
                      @endif
                        {{-- When user login show reply fourm --}}
                        @guest
                        {{-- Show none --}}
                        @else
                        <div class="comment-list left-padding" id="reply-form-{{$comment->id}}" style="display: none">
                          <div
                            class="single-comment justify-content-between d-flex"
                          >
                            <div class="user justify-content-between d-flex">
                              {{-- <div class="thumb">
                                <img src="{{asset('storage/user/'.Auth::user()->image)}}" alt="{{Auth::user()->image}}" width="50px"/>
                              </div> --}}
                              <div class="desc">
                                <h5><a href="#">{{Auth::user()->name}}</a></h5>
                                <p class="date">{{date('D, d M Y H:i')}}</p>
                                <div class="row flex-row d-flex">
                                <form action="{{route('reply.store',$comment->id)}}" method="POST">
                                @csrf
                                  <div class="col-lg-12">
                                    <textarea
                                      id="reply-form-{{$comment->id}}-text"
                                      cols="60"
                                      rows="2"
                                      class="form-control mb-10"
                                      name="message"
                                      placeholder="Messege"
                                      onfocus="this.placeholder = ''"
                                      onblur="this.placeholder = 'Messege'"
                                      required=""
                                    ></textarea>
                                  </div>
                                  <button type="submit" class="btn-reply text-uppercase ml-3">Reply</button>
                                </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endguest
                    </div>
                   @endforeach
                  </div>
                </div>
              </section>
              <!-- End comment-sec Area -->
  
              <!-- Start commentform Area -->
              <section class="commentform-area pb-120 pt-80 mb-100">
              @guest
                  <div class="container">
                      <h4>Please Sign in to post comments - <a href="{{route('login')}}">Sing in</a> or <a href="{{route('register')}}">Register</a></h4>
                  </div>
              @else
                  <div class="container">
                    <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                    <div class="row flex-row d-flex">
                        <div class="col-lg-12">
                            <form action="{{route('comment.store', $service->id)}}" method="POST">
                                @csrf
                            <textarea
                              class="form-control mb-10"
                              name="comment"
                              placeholder="Messege"
                              onfocus="this.placeholder = ''"
                              onblur="this.placeholder = 'Messege'"
                              required=""
                            ></textarea>
                            <button type="submit" class="primary-btn mt-20" href="#">Comment</button>
                        </form>
                        </div>
                    </div>
                  </div>
                  @endguest
              </section>
              <!-- End commentform Area -->
           
            </div>
            {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> --}}
          </div>
    </div>
    {{-- comment --}}


    <!-- adoption-area -->
    <section class="adoption-area-two pt-110 pb-110">
        <div class="container">
@ -183,6 +343,7 @@
                </div>
            </div>
        </div>

        <div class="container custom-container">
            <div class="row adopt-active">
               
@ -220,10 +381,7 @@
        </div>


        <div class="container" style="margin-top:50px">
            <h1>Service Reviews</h1>
            <div id="disqus_thread"></div>
        </div>
      
    </section>
    
    <!-- adoption-area-end -->
@ -285,7 +443,7 @@
        </div>
    </div> --}}

    
{{--     
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
@ -302,11 +460,27 @@
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
</script> --}}

</main>
<script type="text/javascript">
    function showReplyForm(commentId,user) {
      var x = document.getElementById(`reply-form-${commentId}`);
      var input = document.getElementById(`reply-form-${commentId}-text`);
      if (x.style.display === "none") {
        x.style.display = "block";
        input.innerText=`@${user} `;
      } else {
        x.style.display = "none";
      }
    }
</script>


<script id="dsq-count-scr" src="//http-t2001eproject-abc-81.disqus.com/count.js" async></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- main-area-end -->
<script type="text/javascript">
@ -328,95 +502,11 @@
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
<style>
    .left-padding {    
        width:90%;
        margin-left:10%;
    }
</style>

@endsection