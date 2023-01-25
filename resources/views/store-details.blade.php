@extends('layouts.main')
@section('content')

<headerinner>
    <div class="container-fluid r-m-p inner-banner" style="background:url('{{asset('images/inner_banner.png')}}')no-repeat scroll right top #000 ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
        <div class="container r-m-p">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="banner_heading">
                        <h2 class="animated slideInUp">
                        Store Details
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</headerinner>

<section class="main_shop_page">
    <div class="container-fluid r-m-p">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section_content">
                        <h1>BOXES <figure class="clearfix positions"><img src="{{asset('images/line-border.png')}}" class="pull-right"/></figure></h1>
                        <p>Packaging Near Me offers different types and sizes of boxes for various applications to package your goods securely. We offer a variety of boxes, including corrugated boxes, heavy-duty boxes, mailers, and more. You can find the following at our stores:</p>
                    </div>
                </div>
            </div>
        </div>
        <section class="shop-detail-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        @php $get_product_img = DB::table('subcategories')->where('id',$get_product_detail->sub_category)->first()->image; @endphp
                        
                        <a class="lg-img" data-fancybox="gallery" tabindex="0" href="{{asset($get_product_img)}}">
                            <img src="{{asset($get_product_img)}}" alt="*" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-lg-6 my-auto">
                        <h1>{{$get_product_detail->name}}</h1>
                        <div class="product_meta">
                            <!--<span class="pro_meta_1">25 / Bundle 3000 / Bale</span>-->
                            <span class="pro_meta_2">SKU :{{$get_product_detail->vendor_stock_number}}</span>
                        </div>
                        <div class="shipment_box">
                            <a href="javascript:;">Ships within 1-2 business days</a>
                        </div>
                        <div class="variation_box">
                            <h6>Right Mailers™ Fit Guide:</h6> <a data-fancybox="" tabindex="0" href="{{asset('images/smart-locker-img-1.png')}}">

                              <img src="{{asset('images/variation-img-1.png')}}" >


                            </a>
                            <a data-fancybox="" tabindex="0" href="{{asset('images/smart-locker-img-2.png')}}"><img src="{{asset('images/variation-img-2.png')}}"/></a>
                        </div>
                        <h6>{{'$'.$get_product_detail->price}}</h6>
                        <form class="form" action="{{url('create-cart')}}" method="post" id="cartForm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$get_product_detail->id}}" readonly required>

                        <div class="cart-sec">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger btn-number" id="minus"  onclick="quantityHandler(this.id);">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </span>

                                <input type="text" name="qty" id="quantity" class="form-control input-number" value="1" min="1" max="100" required>

                                <span class="input-group-btn leftx">
                                    <button type="button" class="btn btn-success btn-number" id="plus" onclick="quantityHandler(this.id);">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>
                            <div class="bttn-wrap">
                                <a href="javascript:;" id="cartBtn">Add To Cart</a>
                            </div>
                        </div>

                        </form>
                        <div class="details_pro">
                            <h3>DETAILS</h3>
                                  {!! html_entity_decode($get_product_detail->detail) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabination_box">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#additional" aria-controls="home" role="tab" data-toggle="tab">Additional Information</a></li>
                        <li role="presentation" class=""><a href="#product" aria-controls="home" role="tab" data-toggle="tab">Product Tags</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="container">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="additional">
                                <img src="{{asset('images/product-table.png')}}" class="img-responsive" style="padding: 30px 0px">
                            </div>
                            <div role="tabpanel" class="tab-pane" id="product">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</section>



@endsection

@section('js')
<script type="text/javascript">


quantityHandler = (btnId)=>{
let get_quan = parseInt(document.getElementById('quantity').value);
    if(btnId=="plus")
    {
      get_quan++;
      $('#quantity').val(get_quan);
    }else{

    if(get_quan>1)
    {
      get_quan--;
      $('#quantity').val(get_quan);
    }
  }
}

document.getElementById('quantity').addEventListener('keydown', function(e) {
    var key   = e.keyCode ? e.keyCode : e.which;

    if (!( [8, 9, 13, 27, 46, 110, 190].indexOf(key) !== -1 ||
         (key == 65 && ( e.ctrlKey || e.metaKey  ) ) ||
         (key >= 35 && key <= 40) ||
         (key >= 48 && key <= 57 && !(e.shiftKey || e.altKey)) ||
         (key >= 96 && key <= 105)
       )) e.preventDefault();
});


$('#cartBtn').on('click',function(){
  $('#cartForm').submit();
});




</script>
@endsection
