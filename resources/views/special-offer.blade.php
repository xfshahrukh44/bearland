@extends('layouts.main')
@section('content')


<headerinner>
    <div class="container-fluid r-m-p inner-banner" style="background:url('{{asset('images/inner_banner.png')}}')no-repeat scroll right top #000 ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
        <div class="container r-m-p">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="banner_heading">
                        <h2 class="animated slideInUp">
                          Special
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
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section_content">
                        <h1> {{ $cms_home2->name }} <figure class="clearfix positions"><img src="{{asset('images/line-border.png')}}" class="pull-right"/></figure></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="career_content">
                        
                            {!! $cms_home2->content !!}
                       
                       
                        <a href="{{('contact-us')}}">contact us</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                    <div class="thumbnail_box">
                        <img src="/{{$cms_home2->image}}" class="img-responsive"/>
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
