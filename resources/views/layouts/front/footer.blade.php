<?php $footercms = DB::table('pages')->where('id', 6)->first(); ?>
<?php $_getConfig=DB::table('m_flag')->where('is_active','1')->where('is_config','1')->get(); ?>
{{-- @dd($_getConfig) --}}

<footer class="main_footer">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <div class="footer_contact_box">
                        <a href="#">
                            <img src="{{asset('images/ftrlogo.png')}}" class="img-responsive"/>
                        </a>
                       <h5>  @foreach ($_getConfig as $item )
                        @if($item->flag_type === "ADDRESS")
                           {{ $item->flag_value }}
                        @endif
                    @endforeach
                     </h5>
                     <h6> <span> Tel: </span> @foreach ($_getConfig as $item )
                         @if($item->flag_type === "COMPANYPHONE")
                            {{ $item->flag_value }}
                         @endif
                     @endforeach </h6>
                     <h6> <span> Email:  </span>@foreach ($_getConfig as $item )
                        @if($item->flag_type === "COMPANYEMAIL")
                           {{ $item->flag_value }}
                        @endif
                    @endforeach</h6>
                     <ul class="links-ul f-social">
                        <li><a href="@foreach ($_getConfig as $item )
                        @if($item->flag_type === "FACEBOOK")
                           {{ $item->flag_value }}
                        @endif
                    @endforeach"><i class="fa fa-facebook"></i> </a></li>
                        <li><a href="@foreach ($_getConfig as $item )
                        @if($item->flag_type === "TWITTER")
                           {{ $item->flag_value }}
                        @endif
                    @endforeach"> <i class="fa fa-twitter"></i></a></li>
                        <li><a href="@foreach ($_getConfig as $item )
                        @if($item->flag_type === "LinkedIn")
                           {{ $item->flag_value }}
                        @endif
                    @endforeach"><i class="fa fa-linkedin"></i> </a></li>
                        {{-- <li><a href="@foreach ($_getConfig as $item )
                            @if($item->flag_type === "INSTAGRAM")
                           {{ $item->flag_value }}
                        @endif
                        @endforeach"><i class="fa fa-instagram"></i> </a></li> --}}
                      </ul>
                    </div>

                </div>
                <div class="col-lg-3">
                 <div class="ftr-list">
                     <h3> INFORMATION </h3>
                     <ul>
                       <li> <a href="{{url('/')}}">  Home  </a> </li>
                       <li> <a href="{{url('store')}}">  SHOP  </a> </li>
                       <li> <a href="{{url('about-us')}}">  ABOUT US  </a> </li>
                       <li> <a href="{{url('contact-us')}}">  CONTACT US  </a> </li>

                     </ul>
                 </div>
                </div>
                <div class="col-lg-3">
                    <div class="ftr-list">
                    <h3> ACCOUNT </h3>
                        <ul>
                        <li> <a href="#">  WISHLIST </a> </li>
                        <li> <a href="#">  MY ACCOUNT  </a> </li>
                        <li> <a href="#">  CHECKOUT </a> </li>
                        <li> <a href="#">  OUR CART </a> </li>
                        <li> <a href="{{('terms-conditions')}}">  TERMS & CONDITIONS </a> </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ftr-list">
                    <h3> ABOUT </h3>
                        <P>
                        Packaging Near Me provides the highest quality,
                        custom-specific boxes and complete, fast, and reliable packaging solutions that meet your needs and budget!
                        </P>
                                             <h6> BOXING AND PACKAGING SOLUTIONS FOR EVERYONE! </h6>

                        <img src="{{asset('images/card.jpg')}}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xs-12 col-xs-12 col-md-12 col-lg-12 text-center">
                <div class="copy_right_content"><p>@foreach ($_getConfig as $item )
                    @if($item->flag_type == "copyright")
                       {{ $item->flag_value }}
                    @endif
                @endforeach</p></div>
            </div>
        </div>
        </div>
    </div>
</footer>
