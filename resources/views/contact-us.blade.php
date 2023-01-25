@extends('layouts.main')
@section('content')

<headerinner>
    <div class="container-fluid r-m-p inner-banner" style="background:url('{{asset('images/contact-us-banner.png')}}')no-repeat scroll right top #000 ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
        <div class="container r-m-p">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="banner_heading">
                        <h2 class="animated slideInUp">
                          Contact Us
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</headerinner>


<section class="main_contact_us_section main_popular_category">
    <div class="container-fluid r-m-p">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section_content">
                        <h1>Get In Touch With Us !</h1>
                        <figure class="clearfix"><img src="{{asset('images/line-border.png')}}" class="pull-right"/></figure>
                        <p>
                            Fill out the form below with all your details. We will get back to you soon!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row main_popular_category">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="site_map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946234!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1616706853567!5m2!1sen!2s" width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="site_contact_form_box">
                        <form class="contact_form_section clearfix" action="{{url('contact-us-submit')}}" method="post">
                          @csrf
                            <div class="form-group">
                                <input type="text"  name="name" class="form-control" placeholder="*Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text"  name="email" class="form-control" placeholder="*Email">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone"  class="form-control" placeholder="*Phone">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="6" placeholder="*Message" required></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-default">SEND MESSAGE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
