<div class="header">
    <div class="container">
        <div class="logo">
            <a href="{{ route("home") }}"><span>BINI</span> MOY</a>
        </div>
        <div class="header-right">
            <a class="account" href="login.html">My Account</a>
            <span class="active uls-trigger">Select language</span>
            <!-- Large modal -->
            <div class="selectregion">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Select Your Region</button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;</button>
                                <h4 class="modal-title" id="myModalLabel">
                                    Please Choose Your Location</h4>
                            </div>
                            <div class="modal-body">
                                {{-- <form class="form-horizontal" role="form"> --}}
                                <form class="form-horizontal" action="{{ route('locationPost') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <select id="basic2" name="location_id" class="show-tick form-control" multiple>

                                            <option selected style="display:none;color:#eee;">Select City
                                            </option>
                                            <optgroup label="RUET">
                                                <optgroup label="RUET">
                                                    <option value="1">RUET all</option>
                                                    <option value="10">Selim Hall</option>
                                                    <option value="11">Zia Hall</option>
                                                    <option value="12">Hamid Hall</option>
                                                </optgroup>
                                                <optgroup label="RU">
                                                    <option value="2">RU all</option>
                                                    <option value="16">Shaheed Ziaur Rahman Hall</option>
                                                    <option value="17">Madar Bux Hall</option>
                                                    <option value="18">Rokeya Hall</option>
                                                </optgroup>
                                                <optgroup label="RMC">
                                                    <option value="3">RMC all</option>
                                                    <option value="20">Unknown Hall1</option>
                                                    <option value="21">Unknown Hall2</option>
                                                    <option value="22">Unknown Hall3</option>
                                                </optgroup>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <input type="submit" value="Select">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#myModal').modal('');
                </script>
            </div>
        </div>
    </div>
</div>
<div class="main-banner banner text-center">
    <div class="container">
        <h1>Sell or Advertise <span class="segment-heading"> anything online </span> with Binimoy</h1>
        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> --}}
        <p></p>
        {{-- <a href="{{ route('addCategory') }}">Add Category</a> --}}
        {{-- <div class="clearfix"> </div>
        <div></div> --}}

        {{-- <div class="container"> --}}
            <div class="sign-up">
                <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="search" class="form-control" placeholder="Find Anything" name="search">
                </form>
                {{-- </div> --}}
                <hr >
                <a href="{{ route('addPost') }}">Post Free Ad</a>
            </div>
        {{-- </span> --}}
    </div>
</div>
