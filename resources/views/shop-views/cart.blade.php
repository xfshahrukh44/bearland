@extends('layouts.main')
@section('content')



<headerinner>
    <div class="container-fluid r-m-p inner-banner" style="background:url('{{asset('images/inner_banner.png')}}')no-repeat scroll right top #000 ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
        <div class="container r-m-p">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="banner_heading">
                        <h2 class="animated slideInUp">
                        Cart
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
       
        {{--<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section_content">
                        <h1>BOXES <figure class="clearfix positions"><img src="{{asset('images/line-border.png')}}" class="pull-right"/></figure></h1>
                        <p>Packaging Near Me offers different types and sizes of boxes for various applications to package your goods securely. We offer a variety of boxes, including corrugated boxes, heavy-duty boxes, mailers, and more. You can find the following at our stores:</p>
                    </div>
                </div>
            </div>--}}
            
            {{--<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ShopList">
                    <div class="shop_form_section">
                        <form class="form-inline">
                            <div class="form-group">
                                <label class="" for="">Category:</label>
                                <select class="form-control">
                                    <option>Bulk cargo Boxes</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="" for="">Color:</label>
                                <select class="form-control">
                                    <option></option>
                                    <option>Red</option>
                                    <option>Blue</option>
                                    <option>Black</option>
                                    <option>Yellow</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="" for="">Choose Box:</label>
                                <select class="form-control">
                                    <option></option>
                                    <option>Stock boxes</option>
                                    <option>Custom boxes</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="" for="">Length:</label>
                                <input type="text" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="" for="">Width:</label>
                                <input type="text" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="" for="">Height:</label>
                                <input type="text" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>--}}
            
        <form action="{{url('update-cart')}}" method="POST" id="updateForm">
            @csrf
            
            <div class="row">
                <table class="table main_table_produt">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Type</th>
                            <th>Dimensions</th>
                            <th>Right Mailers</th>
                            <th>Unit of Measure</th>
                            <th>Unit Price</th>
                            <th>Sub Price</th>
                            <th>Remove</th>

                        </tr>
                    </thead>
                    <tbody>

                      @foreach($cart as $product=>$value)
                      @php 
                      $product = DB::table('stores')
                                      ->where('id',$value['id'])
                                      ->first(); 
                    
                    @endphp
                      <tr>

                          <td><a href="{{url('store-details/'.$product->id)}}" class="pro_small_box"><img src="{{asset('images/product-small-img.png')}}" class="img-responsive" width="100px;"/></a></td>
                          <td>{{$product->name}}</td>
                          
                          <td>
                            <input type="hidden" name="product_id[]" value="{{$value['id']}}">   
                           <input type="number" name="qty[]" class="form-control" value="{{$value['qty']}}">
                           <a href="javascript:void(0);" class="btn_red" id="update_ct_btn"><i class="fa fa-check"></i></a>        
                          </td>
                          
                          <td>{{$product->type}}</td>
                          <td>{{$product->size }}</td>
                          <td><a data-fancybox="" tabindex="0" href="{{asset('images/smart-locker-img-1.png')}}"><img src="{{asset('images/variation-img-1.png')}}"/></a> <a data-fancybox="" tabindex="0" href="{{asset('images/smart-locker-img-2.png')}}"><img src="{{asset('images/variation-img-2.png')}}"/></a></td>
                          <td>{{$product->unit_of_measure}}</td>
                          <td>{{"$".$product->price}}</td>
                          <td>${{$value['baseprice']*$value['qty']}}</td>
                          <td><a href="{{url('/remove-cart/'.$value['id'])}}" class="btn_red">x</a></td>

                      </tr>
                      @endforeach

                    </tbody>

                </table>
               
            </div>
            
            
            
            {{--<div class="row">
                <p>
                    Packaging Near Me offers fast and reliable custom packaging options for everyone. We believe in providing exceptional services to our valuable clients to reach the maximum level of customer satisfaction. Our cost-effective, less complex, and trustworthy services help us stand out in a crowd of our competitors. We always think out of the box and go above and beyond when it comes to serve our valuable customers. That’s one of our many impressive core values that sets us apart from the giant box companies in the United States.
                </p>
                <p>
                    Our boxes and packaging solutions come with the best quality and best value and are great for retail, display, gifts, and suit your specific packaging needs. Our clients trust us because they know we provide the finest products with custom-made designs at the most competitive prices. We are a team of professionals that believes that the company’s success is tied to our customer’s success. Besides providing businesses with custom printed boxes and custom packaging solutions, we also try to understand our client’s business – using our expertise to help them get the products and services that would work best towards their business goals. With our more than 12 years of experience, we have made our reputation in this industry as a quick, most trusted, and reliable company. Top-notch quality, fast turnaround, quick order placement, competitive pricing, and exceptional customer service are some of our qualities that help us stand out in the crowd of competitors!
                </p>
            </div>--}}
            
            <a href="{{url('/checkout')}}" class="btn btn-danger btn-lg">Proceed To Checkout</a>    
            
        </div>
    </div>
</section>
@endsection

@section('js')
<script>

$('#update_ct_btn').on('click',function(){
   $('#updateForm').submit(); 
});
</script>
@endsection


