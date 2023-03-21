@extends('frontend.master')
@section('title')
Binimoy Category Ad
@endsection
@section('content')
<h5 class="text-right text-success">{{ Session::get('message') }}</h5>
<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Post an Ad</h2>
        <div class="post-ad-form">
            <form action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Category Name <span>*</span></label>
                <input type="text" name="category_name" class="phone" placeholder="">
                <div class="clearfix"></div>

                <label>Category logo <span>*</span></label>
                <input type="text" name="category_logo" class="phone" placeholder="">
                <div class="clearfix"></div>

                <label>Description <span>*</span></label>
                <textarea class="mess" name="category_description" placeholder="Write few lines about your product"></textarea>
                <div class="clearfix"></div>

                <div class="personal-details">
                    <input type="hidden" name="active" value="1">
                    <input type="submit" value="Add">
                    <div class="clearfix"></div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
