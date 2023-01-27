@php $cart = Session::get('cart');  @endphp
@inject('DBCategory', '\App\helpers\DBCategory')


<div class="container-fluid main_header_top_baar r-m-p">
    <div class="container r-m-p">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="top_heading">
                    <h6>Packaging near me is fully operational. <a href="#">Learn more</a> about our response to COVID-19. Stay strong and safe!</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-default navbar-xee" role="navigation">
    <div class="container-fluid">
        <div class="row" id="row1">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 r-m-p">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">-->
                    <!--    <span class="sr-only">Toggle navigation</span>-->
                    <!--    <span class="icon-bar"></span>-->
                    <!--    <span class="icon-bar"></span>-->
                    <!--    <span class="icon-bar"></span>-->
                    <!--</button>-->
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" class="img-responsive"/></a>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col2">
                <div class="header_mid_section clearfix">
                    <div class="col-xs-2 col1">
                        <div class="phone_number">
                            <h6><figure><img src="{{asset('images/phone-icon-1.png')}}"/></figure><a href="tel:666 888 0000">666 888 0000</a></h6>
                        </div>
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-6 col2">
                        <form method="POST" action="{{ url('main-search') }}">
                            @csrf
                            <div class="header_search_bar">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4 col3">
                        <div class="mid_navigation">
                            <ul>
                                <li><a href="javascript:;">Resource Center</a></li>
                                <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                                @if (Auth::check() && Auth::user())
                                <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                @else
                                <li><a href="{{url('login')}}">Sign In</a></li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<nav class="navbar sticky navbar-default navbar-xee" role="navigation">
    <div class="container-fluid">
        <div class="row" id="row2">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 r-m-p">
                {{-- <div class="category_menu">
                    <h6><figure><a href="javascript:;"><img src="{{asset('images/burger-icon.png')}}"/></a></figure></h6>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> --}}
                <div class="side-header">
                    <div class="toggle-header"></div>
                    <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
                    <label for="openSidebarMenu" class="sidebarIconToggle">
                        <div class="spinner diagonal part-1"></div>
                        <div class="spinner horizontal"></div>
                        <div class="spinner diagonal part-2"></div>
                    </label>
                    <h6>SHOP BY CATEGORY</h6>
                    <div id="sidebarMenu">
                        {{-- <ul class="sidebarMenuInner">
                            @foreach($DBCategory::getCategory() as $key => $value)
                                <a href="/store?category_id={{$value->id}}" data-toggle="collapse" data-target="#demo"><span>{{$value->name}}</span></a>
                                @foreach($value->subcategories as $subcat)
                                    <li id="demo" class="collapse"><a href="/store?category_id={{$subcat->id}}"><span>{{$subcat->name}}</span></a></li>
                                @endforeach
                            @endforeach
                        </ul> --}}
                        <ul class="list-unstyled components sidebarMenuInner">
                            @foreach($DBCategory::getCategory() as $key => $value)
                            <li class="">
                                <a href="#homeSubmenu{{ $value->id  }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{$value->name}}</a>

                                <ul class="collapse list-unstyled" id="homeSubmenu{{ $value->id  }}">
                                    @foreach($value->subcategories as $subcat)
                                                 <li id="#"><a href="{{url('store')}}?sub_category_id={{$subcat->id}}"><span>{{$subcat->name}}</span></a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach

                            @foreach($DBCategory::getBinCategories() as $key => $value)
                                <li class="">
                                    <a href="#homeSubmenu{{ $value->id  }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{$value->name}}</a>

                                    <ul class="collapse list-unstyled" id="homeSubmenu{{ $value->id  }}">
                                        @foreach($value->subcategories as $subcat)
                                            <li id="#"><a href="{{url('store')}}?sub_category_id={{$subcat->id}}"><span>{{$subcat->name}}</span></a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                            {{--Tags Categories--}}
                            @php
                                $tag_categories = $DBCategory::getTagsCategories();
                                $main_tag_category = $tag_categories[0];
                                unset($tag_categories[0]);
                            @endphp
                            <li class="">
                                <a href="#homeSubmenu{{ $main_tag_category->id  }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{$main_tag_category->name}}</a>

                                <ul class="collapse list-unstyled" id="homeSubmenu{{ $main_tag_category->id  }}">
                                    {{--SubCategories--}}
                                    @foreach($main_tag_category->subcategories as $subcat)
                                        <li id="#"><a href="{{url('store')}}?sub_category_id={{$subcat->id}}"><span>{{$subcat->name}}</span></a></li>
                                    @endforeach

                                    {{--Main Categories--}}
                                    @foreach($tag_categories as $tag_category)
{{--                                        <li id="#"><a href="{{url('store')}}?category_id={{$tag_category->id}}"><span>{{$tag_category->name}}</span></a></li>--}}

                                        @foreach($tag_category->subcategories as $subcat2)
                                            <li id="#"><a href="{{url('store')}}?sub_category_id={{$subcat2->id}}"><span>{{$subcat2->name}}</span></a></li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 r-m-p">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse main_nav" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav center-block">
                        <li><a href="{{url('about-us')}}">About Us</a></li>
                        <li><a href="{{url('store')}}">By Box Style</a></li>
                        <li><a href="javascript:void(0)">Shipping Supplies</a></li>
                        <li class="nav-item dropdown">

                            @if(Auth::user())

                            <a  href="{{url('catalog-request')}}" id="">
                            Catalog Request
                            </a>

                            @else
                             <a  href="{{url('signin')}}" id="">
                            Catalog Request
                            </a>

                            @endif



                            {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Packaging Near Me’s Catalog</a>
                            <a class="dropdown-item" href="#">Janitorial Catalog</a>
                            <a class="dropdown-item" href="#">Material Handling Catalog</a>
                            </div>--}}
                        </li>
                        <li><a href="{{ url('special-offer') }}">Special Offers</a></li>
                        <li><a href="{{url('career')}}">Careers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 r-m-p">
                <div class="cart_header_box">
                    <ul>
                        <li>
                            <a href=""><i class="fa fa-heart-o" aria-hidden="true"></i> wishlist</a>
                        </li>
                        <li>
                            <a href="{{url('show-cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>{{count($cart ?? [])}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</nav>
