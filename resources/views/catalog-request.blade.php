@extends('layouts.main')
@section('content')

<section class="main_popular_category">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section_content">
                        <h1>CATALOG REQUEST <figure class="clearfix positions"><img src="{{asset('images/line-border.png')}}" class="pull-right" style="width:80%;" /></figure></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <form action="{{url('catalog-request-submit')}}" method="POST">
                @CSRF
                
                <div class="col-xs-12 col-xs-12 col-md-12 col-lg-12">
                    <div class="main_form_section_catalog">
                        <h6>Account Type:</h6>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Business/Company"> Business/Company
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Personal"> Personal  
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Government"> Government
                        </label>
                        <h2>Ordering a copy of our catalog is free and easy!</h2>
                        <p>
                            We feel happy when our customers request the latest edition of our catalog. We provide both print and online web document to our catalog. 
                            Need the latest issue? All you need to do is simply fill in the form below and tick the check box for the catalog you want to receive. Our Full Catalog is just a click away!
                        </p>
                        <h2>Choose Your Catalog</h2>
                       
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name*:" value="{{Auth::user()->name}}" required> 
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" name="company" class="form-control" placeholder="Company*:" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Title*:" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address Line 1*:" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                  <input type="text" name="content" class="form-control" placeholder="suite, apt" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" name="address2" class="form-control" placeholder="Address Line 2 (optional):" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="number" name="zip_code" class="form-control" placeholder="Zip Code*:" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" name="state" class="form-control" placeholder="State*:" required>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                   <input type="text" name="country" class="form-control" placeholder="Country" required> 
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="number" name="phone_no" class="form-control" placeholder="Phone Number*:" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                   <input type="text" class="form-control" placeholder="Employees At Location" required>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Confirm Email*:" value="{{Auth::user()->email}}" required>
                                </div>
                            </div>
                           <!-- <div class="col-xs-4">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" id="inputSuccess2" placeholder="Password (optional)"  aria-describedby="inputSuccess2Status">
                                    <span class="glyphicon glyphicon glyphicon-eye-open form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                </div>
                            </div>-->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="car_form_btn btn btn-default center-block">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
               
                </form>
                
                
            </div>
        </div>
    </div>
</section>
@endsection
