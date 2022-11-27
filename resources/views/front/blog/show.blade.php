@extends('front.layout.master')

@section('title')
    Blog show
@endsection

@section('content')
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                </div>
                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>{{ $blogs->title }}</h2>
                        <p>{{ $blogs->category }} <span>- {{date('M d, Y',strtotime($blogs->created_at))}}</span></p>
                    </div>
                    <div class="blog-large-pic">
                        <img src="front/img/blog/{{$blogs->image}}" alt="">
                    </div>
                    <div class="blog-detail-desc">
                        <p>{!! $blogs->content !!}</p>
                    </div>
                    <div class="blog-quote">
                        <p>“ Technology is nothing. What's important is that you have a faith in people, that
                            they're basically good and smart, and if you give them tools, they'll do wonderful
                            things with them.” <span>- Steven Jobs</span></p>
                    </div>
                    <div class="blog-more">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="front/img/blog/blog-detail-1.jpg" alt="">
                            </div>
                            <div class="col-sm-4">
                                <img src="front/img/blog/blog-detail-2.jpg" alt="">
                            </div>
                            <div class="col-sm-4">
                                <img src="front/img/blog/blog-detail-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <p>Sum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                    <div class="tag-share">
                        <div class="details-tag">
                            <ul>
                                <li><i class="fa fa-tags"></i></li>
                                <li>Travel</li>
                                <li>Beauty</li>
                                <li>Fashion</li>
                            </ul>
                        </div>
                    </div>
                    <div class="posted-by">
                        <div class="pb-pic">
                            <img src="front/img/blog/post-by.png" alt="">
                        </div>
                        <div class="pb-text">
                            <a href="#">
                                <h5>Shane Lynch</h5>
                            </a>
                            <p>Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                amodo</p>
                        </div>
                    </div>
                    <div class="leave-comment">
                        <h4>Leave A Comment</h4>
                        <form action="#" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Messages"></textarea>
                                    <button type="submit" class="site-btn">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
