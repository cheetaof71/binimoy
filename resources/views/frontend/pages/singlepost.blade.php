@extends('frontend.master')
@section('title')
Binimoy Single Post View
@endsection
@section('content')
<div class="single-page main-grid-border">
    <div class="container">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="index.html">Home</a></li>
            <li><a href="all-classifieds.html">All Ads</a></li>
            <li class="active"><a href="mobiles.html">Mobiles</a></li>
            <li class="active">Mobile Phone</li>
        </ol>
        <div class="product-desc">
            <div class="col-md-7 product-view">
                <h2>{{ $post->post_name }}</h2>
                <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">city</a>|
                        {{\Carbon\Carbon::parse($post->created_at)->format('d M H:i')}}, Ad ID: 2023{{ $post->id }}</p>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach (json_decode($post->post_image) as $image)
                        <li data-thumb="{{ asset($image) }}">
                            <img src="{{ asset($image) }}" />
                        </li>
                        @endforeach
                        {{-- <li data-thumb="{{ asset('') }}images/ss2.jpg">
                            <img src="{{ asset('') }}images/ss2.jpg" />
                        </li>
                        <li data-thumb="{{ asset('') }}images/ss3.jpg">
                            <img src="{{ asset('') }}images/ss3.jpg" />
                        </li> --}}
                    </ul>
                </div>
                <!-- FlexSlider -->
                <script defer src="{{ asset('') }}js/jquery.flexslider.js"></script>
                <link rel="stylesheet" href="{{ asset('') }}css/flexslider.css" type="text/css" media="screen" />

                <script>
                    // Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
                </script>
                <!-- //FlexSlider -->
                <div class="product-details">
                    <h4>Brand : <a href="#">{{ $post->brand }}</a></h4>
                    <h4>Views : <strong>{{ $post->view_count }}</strong></h4>
                    {{-- <p><strong>Display </strong>: 1.5 inch HD LCD Touch Screen</p> --}}
                    <p><strong>Summary</strong> : {{ $post->short_description }}</p>

                </div>
            </div>
            <div class="col-md-5 product-details-grid">
                <div class="item-price">
                    <div class="product-price">
                        <p class="p-price">Price</p>
                        <h3 class="rate">$ {{ $post->price }}</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="condition">
                        <p class="p-price">Condition</p>
                        <h4>{{ $post->condition }}</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="itemtype">
                        <p class="p-price">Brand</p>
                        <h4>{{ $post->brand }}</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="interested text-center">
                    <h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
                    <p><i class="glyphicon glyphicon-earphone"></i>{{ $post->phone }}</p>
                </div>
                <div class="tips">
                    <h4>Safety Tips for Buyers</h4>
                    <ol>
                        <li><a href="#">Contrary to popular belief.</a></li>
                        <li><a href="#">Contrary to popular belief.</a></li>
                        <li><a href="#">Contrary to popular belief.</a></li>
                        <li><a href="#">Contrary to popular belief.</a></li>
                        <li><a href="#">Contrary to popular belief.</a></li>
                        <li><a href="#">Contrary to popular belief.</a></li>
                        <li><a href="#">Contrary to popular belief.</a></li>
                        <li><a href="#">Contrary to popular belief.</a></li>
                        <li><a href="#">Contrary to popular belief.</a></li>
                    </ol>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
