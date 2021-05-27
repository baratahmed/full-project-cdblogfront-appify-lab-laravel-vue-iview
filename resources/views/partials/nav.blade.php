<!-- HEADER -->
<div style="position: relative;">
    <div class="header">
        <div class="menu_all" id="myHeader">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="logo">
                            <a href="{{asset('/')}}">
                                <div class="logo_img">
                                    <img src="/img/logo.png" alt="image">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-8 col-md-8 col-lg-8">
                        <div class="menu_right d-flex">
                            <div class="menu_right_list">
                                <ul class="menu_right_ul d-flex">
                                    <li class="dis_fx_cntr">
                                        <a href="{{asset('/')}}">HOME</a>
                                    </li>
                                    @if (count ($cats) > 0)
                                        @foreach ($cats as $cat)
                                        <li class="dis_fx_cntr">
                                            <a href="{{url('/category',[$cat->categoryName,$cat->id])}}">{{$cat->categoryName}}</a>
                                            {{-- <a href="/category/{{$cat->categoryName}}/{{$cat->id}}">{{$cat->categoryName}}</a> --}}
                                        </li>
                                        @endforeach
                                    @endif
                                    <li>
                                        <a href="{{ url('/about') }}">ABOUT</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/contact') }}">CONTACT</a>
                                    </li>

                                    {{-- <li>
                                        <a href="gallery.html">Gallery</a>
                                    </li>

                                    <li>
                                        <a href="contact_me.html">Author</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <Search></Search>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADER -->
