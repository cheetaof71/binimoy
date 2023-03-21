@extends('frontend.master')
@section('title')
Binimoy Post Ad
@endsection
@section('content')
<h5 class="text-right text-success">{{ Session::get('message') }}</h5>
<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Post an Ad</h2>
        <div class="post-ad-form">
            <form action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Select Category <span>*</span></label>
                <select class="" name="category_id">
                    {{-- <option >Select Category</option> --}}
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                    {{-- <option value="1">Select Category</option>
                    <option value="2">Mobiles</option> --}}
                    {{-- <option>Electronics and Appliances</option>
                    <option>Cars</option>
                    <option>Bikes</option>
                    <option>Furniture</option>
                    <option>Pets</option>
                    <option>Books, Sports and hobbies</option>
                    <option>Fashion</option>
                    <option>Kids</option>
                    <option>Services</option>
                    <option>Real, Estate</option> --}}
                </select>
                <div class="clearfix"></div>



                <label>Ad Name <span>*</span></label>
                <input type="text" name="post_name" class="phone" placeholder="">
                <div class="clearfix"></div>


                <label>Ad Title <span>*</span></label>
                <input type="text" name="post_title" class="phone" placeholder="">
                <div class="clearfix"></div>

                <label> Price <span>*</span></label>
                <input type="text" name="price" class="phone" placeholder="">
                <div class="clearfix"></div>

                <label>Condition <span>*</span></label>
                {{-- <input type="text" name="condition" class="phone" placeholder=""> --}}
                <select class="" name="condition">

                    <option value="New">New</option>
                    <option value="Used">Used</option>
                </select>
                <div class="clearfix"></div>

                <label>Brand <span>*</span></label>
                <input type="text" name="brand" class="phone" placeholder="">
                <div class="clearfix"></div>

                <label>Ad Description <span>*</span></label>
                <textarea class="mess" name="short_description" placeholder="Write few lines about your product"></textarea>
                <div class="clearfix"></div>


                <label>Ad Long Description <span>*</span></label>
                <textarea class="mess" name="long_description" placeholder="Write few lines about your product"></textarea>
                <div class="clearfix"></div>



                <div class="upload-ad-photos">
                    <label>Photos for your ad :</label>
                    <div class="photos-upload-view">
                        {{-- <form id="upload" action="index.html" method="POST" enctype="multipart/form-data">

                            <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

                            <div>
                                <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                                <div id="filedrag">or drop files here</div>
                            </div>

                            <div id="submitbutton">
                                <button type="submit">Upload Files</button>
                            </div>

                        </form> --}}

                        <div>
                            <input type="file" id="fileselect" name="post_image[]" multiple="multiple" />
                            <div id="filedrag">or drop files here</div>
                        </div>

                        {{-- <div id="messages">
                            <p>Status Messages</p>
                        </div> --}}
                    </div>
                    <div class="clearfix"></div>
                    <script src="js/filedrag.js"></script>
                </div>
                <div class="personal-details">
                    {{-- <form> --}}
                        <label>Your Name <span>*</span></label>
                        <input type="text" name="name" class="name" placeholder="">
                        <div class="clearfix"></div>


                        <label>Your Mobile No <span>*</span></label>
                        <input type="text" name="phone" class="phone" placeholder="">
                        <div class="clearfix"></div>

                        <label>Your Email Address<span>*</span></label>
                        <input type="text" name="email" class="email" placeholder="">
                        <div class="clearfix"></div>
                        <label>Location <span>*</span></label>
                        {{-- <div class="form-group"> --}}
                            <select name="sub_location_id">

                                <option selected style="display:none;color:#eee;">Select Hall
                                </option>
                                <optgroup label="RUET">
                                    <option value="10">Selim Hall</option>
                                    <option value="11">Zia Hall</option>
                                    <option value="12">Hamid Hall</option>
                                </optgroup>
                                <optgroup label="RU">
                                    <option value="16">Shaheed Ziaur Rahman Hall</option>
                                    <option value="17">Madar Bux Hall</option>
                                    <option value="18">Rokeya Hall</option>
                                </optgroup>
                                <optgroup label="RMC">
                                    <option value="20">Unknown Hall1</option>
                                    <option value="21">Unknown Hall2</option>
                                    <option value="22">Unknown Hall3</option>
                                </optgroup>
                                </optgroup>
                            </select>
                        {{-- </div> --}}
                        {{-- <div class="form-group"> --}}
                            <select name="location_id" >

                                <option selected style="display:none;color:#eee;">Select University
                                </option>
                                <optgroup label="RUET">
                                    <option value="1">RUET</option>

                                </optgroup>
                                <optgroup label="RU">
                                    <option value="2">RU</option>

                                </optgroup>
                                <optgroup label="RMC">
                                    <option value="3">RMC</option>

                                </optgroup>
                                </optgroup>
                            </select>
                        {{-- </div> --}}


                        <p class="post-terms">By clicking <strong>post Button</strong> you accept our <a
                                href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html"
                                target="_blank">Privacy Policy</a></p>
                        <input type="hidden" name="active" value="1">
                        <input type="submit" value="Post">
                        <div class="clearfix"></div>
                    {{-- </form> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
