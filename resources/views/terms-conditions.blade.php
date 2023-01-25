@extends('layouts.main')
@section('content')

<headerinner>
    <div class="container-fluid r-m-p inner-banner" style="background:url('{{asset('images/inner_banner.png')}}')no-repeat scroll right top #000 ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
        <div class="container r-m-p">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="banner_heading">
                        <h2 class="animated slideInUp">
                        Terms And conditions
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</headerinner>


<section class="refund-policy">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    Read the return policy thoroughly before shopping from our store to avoid any discrepancies in the future.
                </p>
                <ul>

                    <li> Returns section: everything is fine except there is going to be a 20% restocking fee associated with returns.</li>
                    <li> Upon cancellation, the shipping charges will be deducted from your refund fee. </li>
                    <li> Non-defective items cannot be returned at any cost. </li>
                    <li> Clearance items, gift cards, bundled items, personalised items, and items marked as non-returnable cannot be returned to the store. </li>
                    <li> If you cancel an order while it is ‘In Process’, it will be considered a non-defective item return and hence the policies will apply. </li>
                    <li> We do not guarantee the exact finishing and color of the product upon delivery due to the nature of fabric and wood.</li>
                    <li>The customers are requested to report shipping damages immediately to the store.</li>




                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
