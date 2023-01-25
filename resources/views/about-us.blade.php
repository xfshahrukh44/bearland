@extends('layouts.main')
@section('content')


<headerinner>
    <div class="container-fluid r-m-p inner-banner" style="background:url('{{asset('images/inner_banner.png')}}')no-repeat scroll right top #000 ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
        <div class="container r-m-p">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="banner_heading">
                        <h2 class="animated slideInUp">
                          About
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</headerinner>


<section class="main_popular_category">
    <div class="container-fluid">
        <div class="container">
            {{-- <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section_content">
                        <h1>About Packaging Near Me</h1>
                        <figure class="clearfix"><img src="{{asset('images/line-border.png')}}" class="pull-right"/></figure>
                        <p>
                            We think outside the box and build packages so good, you won’t be
                            able to contain yourself (pun intended).
                        </p>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="about_content">
                        {!! $pageContent->content !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!----------------About Brand Banner-------------->
<section class="main_brand_Section">
    <div class="container-fluid r-m-p">
        <img src="{{asset('images/about-info-banner.png')}}" class="img-responsive center-block"/>
    </div>
</section>
<!----------------About Steps Section-------------->
<section class="main_About_Steps_Section">
    <div class="container-fluid r-m-p">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="about_steps_box">
                        <ul>
                            <li>
                                <div class="steps">
                                    <figure>
                                        <img src="{{asset('images/choose-icon-1.png')}}" class="img-responsive"/>
                                    </figure>
                                    <h6>Highest Quality</h6>
                                    <p>
                                        Our boxes and packaging solutions come with the best quality and best value. Our clients trust us because they know we provide the finest products at the most competitive prices.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="steps">
                                    <figure>
                                        <img src="{{asset('images/choose-icon-2.png')}}" class="img-responsive"/>
                                    </figure>
                                    <h6>Huge Catalog</h6>
                                    <p>
                                        Our boxes and packaging solutions come with the best quality and best value. Our clients trust us because they know we provide the finest products at the most competitive prices.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="steps">
                                    <figure>
                                        <img src="{{asset('images/choose-icon-3.png')}}" class="img-responsive"/>
                                    </figure>
                                    <h6>Highest Quality</h6>
                                    <p>
                                        Our boxes and packaging solutions come with the best quality and best value. Our clients trust us because they know we provide the finest products at the most competitive prices.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="steps">
                                    <figure>
                                        <img src="{{asset('images/choose-icon-4.png')}}" class="img-responsive"/>
                                    </figure>
                                    <h6>Huge Catalog</h6>
                                    <p>
                                        Our boxes and packaging solutions come with the best quality and best value. Our clients trust us because they know we provide the finest products at the most competitive prices.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="steps">
                                    <figure>
                                        <img src="{{asset('images/choose-icon-5.png')}}" class="img-responsive"/>
                                    </figure>
                                    <h6>Highest Quality</h6>
                                    <p>
                                        Our boxes and packaging solutions come with the best quality and best value. Our clients trust us because they know we provide the finest products at the most competitive prices.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="steps">
                                    <figure>
                                        <img src="{{asset('images/choose-icon-6.png')}}" class="img-responsive"/>
                                    </figure>
                                    <h6>Huge Catalog</h6>
                                    <p>
                                        Our boxes and packaging solutions come with the best quality and best value. Our clients trust us because they know we provide the finest products at the most competitive prices.
                                    </p>
                                </div>
                            </li>
                        </ul>
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

@endsection
