@extends('layouts.main')
@section('content')

<?php $segment = Request::segments(); ?>

<!-- banner_sec -->
<section class="banner_sec">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="inner_text wow fadeInUp" data-wow-duration="2s">
          <h1>Account</h1>
        </div>  
      </div>
    </div>
  </div>
</section>
<!-- banner_sec -->

<main class="my-cart">
    <!-- banner start -->
    <!-- banner end -->

<!-- main content start -->

 <!-- my account wrapper start -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="{{ URL('account') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'account')  ? 'active' : '' ?>"><i class="fa fa-dashboard"></i>
                                        Dashboard</a>
    
                                    <a href="{{ URL('orders') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'orders')  ? 'active' : '' ?>"><i class="fa fa-cart-arrow-down"></i> Orders History</a>
    
                                    <a href="{{ URL('account-detail') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'account-detail')  ? 'active' : '' ?>"><i class="fa fa-user"></i> Account Details</a>
    
                                    <a href="{{ URL('signout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                   
                                   <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade active" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Account Details</h3>
    
                                            <div class="account-details-form">
                                               <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data" id="accountForm">
                                                @csrf
                                                    <div class="row">
                                                    
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">Name</label>
                                                                <input type="text" id="last-name" name="uname" placeholder="Last Name" value="<?php echo Auth::user()->name; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email Addres</label>
                                                        <input type="email" id="email" placeholder="Email Address" name="email" value="<?php echo Auth::user()->email; ?>">
                                                    </div>
    
                                                    <fieldset>
                                                        <legend>Password change</legend>
    
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New Password</label>
                                                                    <input type="password" id="new-pwd" placeholder="New Password" name="password">
                                                                </div>
                                                            </div>
    
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                    <input type="password" id="confirm-pwd" placeholder="Confirm Password" name="password_confirmation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
    
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn" id="updateProfile">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
    
                                    
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->


<!-- main content end -->   
</main>
@endsection
@section('css')
<style type="text/css">
    
</style>
@endsection
@section('js')

<script type="text/javascript">

 $(document).on('click', "#updateProfile", function(e){
        $('#accountForm').submit();
  });

</script>

@endsection