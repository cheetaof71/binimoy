@extends('frontend.master')
@section('title')
Binimoy Homepage
@endsection
@section('content')
<div class="content">
    <div class="categories">
        <div class="container">

            {{-- @foreach ($categories as $category)
            <li><a href="{{  route('categoryView',['id'=>$category->id]) }}" data-hover="{{ $category->category_name }}">{{
                    $category->category_name }}</a></li>
            @endforeach --}}
            @foreach ($categories as $category)
            <div class="col-md-2 focus-grid">
                <a href="{{  route('categoryView',['id'=>$category->id]) }}">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-{{ $category->category_logo }}"></i></div>
                            <h4 class="clrchg">{{ $category->category_name }}</h4>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
    <div class="trending-ads">
        <div class="container">
            <!-- slider -->
            <div class="trend-ads">
                <h2>Trending Ads</h2>
                <ul id="flexiselDemo3">
                    <li>
                        @foreach ($trending as $trending)
                        <div class="col-md-3 biseller-column">
                            <a href="{{ route('postView',['id'=>$trending->id]) }}">
                                @foreach (json_decode($trending->post_image) as $image)
                                <img src="{{ asset($image) }}" height="350" width="20" />
                                @break
                                @endforeach
                                <span class="price">&#36; {{ $trending->price }}</span>
                            </a>
                            <div class="ad-info">
                                <h5>{{ $trending->post_name }}</h5>
                                {{-- <span>19 hour ago</span> --}}
                            </div>
                        </div>
                        @endforeach

                    </li>
                    <li>
                        @foreach ($trending2 as $trending2)
                        <div class="col-md-3 biseller-column">
                            <a href="{{ route('postView',['id'=>$trending2->id]) }}">
                                @foreach (json_decode($trending2->post_image) as $image2)
                                <img src="{{ asset($image2) }}" height="350" width="20" />
                                @break
                                @endforeach
                                <span class="price">&#36; {{ $trending2->price }}</span>
                            </a>
                            <div class="ad-info">
                                <h5>{{ $trending2->post_name }}</h5>
                                {{-- <span>19 hour ago</span> --}}
                            </div>
                        </div>
                        @endforeach
                    </li>

                </ul>
                <script type="text/javascript">
                    $(window).load(function() {
							$("#flexiselDemo3").flexisel({
								visibleItems:1,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 5000,
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: {
									portrait: {
										changePoint:480,
										visibleItems:1
									},
									landscape: {
										changePoint:640,
										visibleItems:1
									},
									tablet: {
										changePoint:768,
										visibleItems:1
									}
								}
							});

						});
                </script>
                <script type="text/javascript" src="js/jquery.flexisel.js"></script>
            </div>
        </div>
        <!-- //slider -->
    </div>
    <div class="mobile-app">
        <div class="container">
            <div class="col-md-2 app-left">
                {{-- <a href="mobileapp.html"><img src="images/app.png" alt=""></a> --}}
            </div>
            <div class="col-md-10 app-right">
                <h3>Binimoy App is the <span>Easiest</span> way for Selling and buying second-hand goods</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor Sed bibendum varius
                    euismod. Integer eget turpis sit amet lorem rutrum ullamcorper sed sed dui. vestibulum odio at
                    elementum. Suspendisse et condimentum nibh.</p>
                <div class="app-buttons">
                    <div class="app-button">
                        <a href="#"><img src="images/1.png" alt=""></a>
                    </div>
                    <div class="app-button">
                        <a href="#"><img src="images/2.png" alt=""></a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
