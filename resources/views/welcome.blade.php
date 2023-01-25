@extends('layouts.main')
@section('content')

<section class="main_slider">
    <div class="slider slider-fors">
        <div class="slider-for">
            <div class="inner_slider" style="background:url('{{asset('images/slider-img-1.png')}}') no-repeat scroll center center  ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
                <div class="container">
                    <div class="the_caption animated slideInUp">
                        <h6>Packaging Near Me</h6>
                        <h1>Boxing and Creative <br> Packaging Solutions</h1>
                        <ul class="slider_list_items">
                            <li><span>Modern Box Styles</span></li>
                            <li><span>Best Quality Boxes</span></li>
                            <li><span>Cost-effective Pricing</span></li>
                            <li><span>Quick Turnaround Time</span></li>
                        </ul>
                        <a href="javascript:;">Choose your style</a>
                    </div>
                </div>
            </div>

            <div class="inner_slider" style="background:url('{{asset('images/slider-img-1.png')}}') no-repeat scroll center center  ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
                <div class="container">
                    <div class="the_caption animated slideInUp">
                        <h6>Packaging Near Me</h6>
                        <h1>Boxing and Creative <br> Packaging Solutions</h1>
                        <ul class="slider_list_items">
                            <li><span>Modern Box Styles</span></li>
                            <li><span>Best Quality Boxes</span></li>
                            <li><span>Cost-effective Pricing</span></li>
                            <li><span>Quick Turnaround Time</span></li>
                        </ul>
                        <a href="javascript:;">Choose your style</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--- Why Choos Us --->
<section class="main_choos_us">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                    <div class="section_content">
                        <h1>Why Choose Us?</h1>
                        <h6>Fast and Reliable Custom Packaging Options for Everyone!</h6>
                        <p>There are several reasons to choose Packaging Near Me for your custom packaging boxes.</p>
                        <ul>
                            <li>
                                <figure>
                                    <img src="{{asset('images/choose-icon-1.png')}}" class="center-block"/>
                                </figure>
                                <span>Customized Designs</span>
                            </li>
                            <li>
                                <figure>
                                    <img src="{{asset('images/choose-icon-2.png')}}" class="center-block"/>
                                </figure>
                                <span>Top-notch Quality</span>
                            </li>
                            <li>
                                <figure>
                                    <img src="{{asset('images/choose-icon-3.png')}}" class="center-block"/>
                                </figure>
                                <span>State-of-the-art Printing</span>
                            </li>
                            <li>
                                <figure>
                                    <img src="{{asset('images/choose-icon-4.png')}}" class="center-block"/>
                                </figure>
                                <span>Quick Order Placement</span>
                            </li>
                            <li>
                                <figure>
                                    <img src="{{asset('images/choose-icon-5.png')}}" class="center-block"/>
                                </figure>
                                <span>Faster Turnaround Time</span>
                            </li>
                            <li>
                                <figure>
                                    <img src="{{asset('images/choose-icon-6.png')}}" class="center-block"/>
                                </figure>
                                <span>Competitive Pricing</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- Most popular Category --->
<section class="main_popular_category">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section_content">
                        <h1>Most Popular Categories</h1>
                        <figure class="clearfix"><img src="{{asset('images/line-border.png')}}" class="pull-right"/></figure>
                        <p>
                            Browse our wide range of popular and smart high-quality
                            packaging categories.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 r-m-p">
                    <div class="col-lg-6">
                        <div class="product_box">
                            <a href="javascript:;">
                                <img src="{{asset('images/product-img-big.png')}}" class="img-responsive"/>
                                <h6>Bags</h6>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product_box">
                            <a href="javascript:;">
                                <img src="{{asset('images/product-img-big.png')}}" class="img-responsive"/>
                                <h6>Carton Sealing Tape</h6>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product_box">
                            <a href="javascript:;">
                                <img src="{{asset('images/product-img-3.jpg')}}" class="img-responsive"/>
                                <h6>Food</h6>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="col-lg-12 r-m-p">
                        <div class="product_box pro_left_box">
                            <a href="javascript:;">
                                <img src="{{asset('images/product-img-3.jpg')}}" class="img-responsive"/>
                                <h6>Bags</h6>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="product_box">
                        <a href="javascript:;">
                            <img src="{{asset('images/pro-bottom.png')}}" class="img-responsive"/>
                            <h6>Bags</h6>
                        </a>

                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="product_box">
                        <a href="javascript:;">
                            <img src="{{asset('images/pro-bottom.png')}}" class="img-responsive"/>
                            <h6>Bags</h6>
                        </a>

                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="product_box">
                        <a href="javascript:;">
                            <img src="{{asset('images/pro-bottom.png')}}" class="img-responsive"/>
                            <h6>Bags</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----------------Pretty Package-------------->
<section class="main_youtube_video_section">
    <div class="container-fluid r-m-p">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 r-m-p">
            <div class="main_video_box">
                <a href="#">
                    <img src="{{asset('images/youtube-img.png')}}" class="img-responsive"/>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="section_content">
                <h6>Exceptional Service with every</h6>
                <h1>Pretty Package</h1>
                <p>We value and respect the trust of our clients which is why we always strive to do our best to provide exceptional services every step of the way! Made from high-quality material, our boxes and packaging materials are great for retail, display, gifts and suit your specific packaging needs.</p>
                <a href="javascript:;">DISCOVER MORE</a>
            </div>
        </div>
    </div>
</section>
<!----------------Testimonials Section HERE-------------->
<section class="main_testimonials_Section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                <div class="section_content">
                    <h1>
                        <span>Testimonials</span>
                        What Our Clients Say
                    </h1>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="main_test">
                    @foreach ($testimonials as $item)
                    <div class="testimonials_box">
                        <figure class="quotes_img"><img src="{{asset('images/quotes.png')}}" class="img-responsive"/></figure>
                        {{-- <h3>My box came on time and looks beautiful 4 stars price could be a little friendlier</h3> --}}
                        <p>
                            {!! $item->comments !!}
                        </p>
                        <div class="avatar_box">
                            <figure>
                                {{-- <img src="{{asset('images/test_avatar.png')}}" class=""/> --}}
                                <img src="{{$item->image}}" class="img-responsive"/>
                            </figure>
                            <h5>
                                {{ $item->name }}
                                <span>{{$item->verified}}</span>
                            </h5>
                        </div>
                    </div>
                    @endforeach
                    
                    {{-- <div class="testimonials_box">
                        <figure class="quotes_img"><img src="{{asset('images/quotes.png')}}" class="img-responsive"/></figure>
                        <h3>My box came on time and looks beautiful 4 stars price could be a little friendlier</h3>
                        <p>
                            “From the website to the product and the service, everything has been phenomenal. The order arrived yesterday, and I absolutely love what you guys sent to me. Thank you so much for meeting my expectations.”
                        </p>
                        <div class="avatar_box">
                            <figure>
                                <img src="{{asset('images/test_avatar.png')}}" class=""/>
                            </figure>
                            <h5>
                                Flora Meyer
                                <span>CEO Beko</span>
                            </h5>
                        </div>
                    </div> --}}
                </div>
</section>





@endsection
@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
