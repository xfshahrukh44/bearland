@extends('layouts.main')
@section('content')



<headerinner>
    <div class="container-fluid r-m-p inner-banner" style="background:url('{{asset('images/career-banner.png')}}') no-repeat scroll right top #000 ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
        <div class="container r-m-p">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="banner_heading">
                        <h2 class="animated slideInUp">
                        Career
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
                        <h1>Work With Us <figure class="clearfix positions"><img src="{{asset('images/line-border.png')}}" class="pull-right"/></figure></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="career_content">
                        {!! $pageContent->content !!}
                        {{-- <p>
                            At Packaging Near Me, we always value and respect the trust our large number of clients put in us. With more than 15 years of experience, we have made our reputation in this industry as a quick, most trusted, and reliable company. Our purpose is to help our clients and businesses understand how this industry operates.
                        </p>
                        <p>
                            We proudly claim that we are different from all our competitors because we provide exceptional customer service to our customers. What sets us apart is that we try to understand what our client or business wants. Once we get the idea about their needs, we use our expertise in helping them get the products and services that would work best towards their business goals. Sound interesting?
                        </p> --}}
                        <a href="{{('contact-us')}}">contact us</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                    <div class="thumbnail_box">
                        <img src="{{asset('images/career_thumbnail.png')}}" class="img-responsive"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section_heading">
                        <h1>Current Openings</h1>
                        <p>Packaging Near Me provides a great working environment to its employees, cares for their needs, and values their suggestions. If you think you can fit right in, join us!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="main_jobs_section">
                        <ul class="jobs_list">
                            @foreach ($jobModel as $item)
                            <li>
                                <h6>{{ $item->title }}</h6>
                                <div class="clearfix job_box">
                                    <div class="col-lg-10 r-m-p">
                                        <div class="clearfix">
                                            <ul>
                                                <li><span>{{ $item->sub_title }}</span></li>
                                                {{-- <li><span>Submission Date: {{ $item->submission_date }}</span></li> --}}
                                                <li><span>Submission Date: {!! date('j F, Y', strtotime($item->submission_date)) !!}</span></li>
                                            </ul>

                                        </div>
                                        {!! $item->detail !!}
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="contact-us.php" class="red_btn">contact us</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
