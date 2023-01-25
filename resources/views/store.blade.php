@extends('layouts.main')
@section('css')
<style>

.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #fe0105;
    border-color: #fe0105;
}

</style>
@endsection
@section('content')

<headerinner>
    <div class="container-fluid r-m-p inner-banner" style="background:url('{{asset('images/inner_banner.png')}}')no-repeat scroll right top #000 ; -o-background-size: cover;    -moz-background-size: cover;    -webkit-background-size:cover;    background-size: cover;">
        <div class="container r-m-p">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="banner_heading">
                        <h2 class="animated slideInUp">
                        Store
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
                        <h1>{{ $mainCat->category->name }} <figure class="clearfix positions"><img src="{{asset('images/line-border.png')}}" class="pull-right"/></figure></h1>
                        <p>Packaging Near Me offers different types and sizes of boxes for various applications to package your goods securely. We offer a variety of boxes, including corrugated boxes, heavy-duty boxes, mailers, and more. You can find the following at our stores:</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ShopList">
                    <div class="shop_form_section">

                        <form class="form-inline" method="POST" action="{{ url('search')}}" >
                            @csrf
                            <div class="form-group">
                                <label class="" for="">Category:</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="">Select Category</option>
                                    @foreach($category as $cat)
                                     <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="" for="">Sub Category:</label>
                                <select class="form-control" name="sub_category" id="sub_category">
                                     <option value="">Select Sub-Category</option>
                                    @foreach($sub_cat as $subcat)
                                    <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group">
                                <label class="" for="">Unit Of Measure:</label>
                                <input type="text" name="measure_unit" class="form-control" id="mou" placeholder="(e.g: M, EA, Cs)">
                            </div>

                             <div class="form-group">
                                <label class="" for="">Pack/Size</label>
                                <input type="text" name="pack_size" class="form-control" id="pack_size" placeholder="(e.g: 1000, 500)">
                            </div>



                            <div class="form-group">
                                <button type="submit"  class="btn btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table main_table_produt">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                              <th>Item</th>
                            <th>SKU</th>

                            <th>Dimensions</th>
                            <th>Right Mailers</th>
                            <th>Unit of Measure</th>
                            <th>Price</th>
                            <th>Add to Cart</th>

                        </tr>
                    </thead>
                    <tbody id="products">
                    @if(count($products) > 0)
                      @foreach($products as $product)
                          @php $product_image = DB::table('subcategories')->where('id',$product->sub_category)->first()->image; @endphp
                            <tr>
                                <td><a href="{{url('store-details/'.$product->id)}}" class="pro_small_box"><img src="{{asset($product_image)}}" class="img-responsive" width="100px;"/></a></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->vendor_stock_number}}</td>
                                <td>{{$product->size ? : $product->pack_size }}</td>
                                <td><a data-fancybox="" tabindex="0" href="{{asset('images/smart-locker-img-1.png')}}"><img src="{{asset('images/variation-img-1.png')}}"/></a> <a data-fancybox="" tabindex="0" href="{{asset('images/smart-locker-img-2.png')}}"><img src="{{asset('images/variation-img-2.png')}}"/></a></td>
                                <td>{{$product->unit_of_measure}}</td>
                                <td>{{'$'.$product->price}}</td>
                                <td><a href="{{url('store-details/'.$product->id)}}" class="btn_red"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Add</a></td>
                            </tr>
                      @endforeach
                    @else
                       <tr>
                           <td colspan="8" style="text-align:center;">No Products Available..!!</td>
                       </tr>

                    @endif

                    </tbody>

                </table>
                {{$products->withQueryString()->links()}}
            </div>
            <div class="row">
                <p>
                    Packaging Near Me offers fast and reliable custom packaging options for everyone. We believe in providing exceptional services to our valuable clients to reach the maximum level of customer satisfaction. Our cost-effective, less complex, and trustworthy services help us stand out in a crowd of our competitors. We always think out of the box and go above and beyond when it comes to serve our valuable customers. That’s one of our many impressive core values that sets us apart from the giant box companies in the United States.
                </p>
                <p>
                    Our boxes and packaging solutions come with the best quality and best value and are great for retail, display, gifts, and suit your specific packaging needs. Our clients trust us because they know we provide the finest products with custom-made designs at the most competitive prices. We are a team of professionals that believes that the company’s success is tied to our customer’s success. Besides providing businesses with custom printed boxes and custom packaging solutions, we also try to understand our client’s business – using our expertise to help them get the products and services that would work best towards their business goals. With our more than 12 years of experience, we have made our reputation in this industry as a quick, most trusted, and reliable company. Top-notch quality, fast turnaround, quick order placement, competitive pricing, and exceptional customer service are some of our qualities that help us stand out in the crowd of competitors!
                </p>
            </div>
        </div>
    </div>
</section>
@endsection



@section('js')
<script>
    $(document).ready(function(){
        $('#category').change(function(){
           var category_id = $(this).val();
            $.ajax({
                url: '{{url('get-subcategories')}}',
                type: 'get',
                data: {

                      "category_id": category_id,
                      },

                    dataType: 'JSON',
                    success: function(response){
                      var data = "<option value=''>Select SubCategory</option>";
                      data += response;

                      $('#sub_category').empty().append(data);


                }
             });

        });

        // $('#submit_btn').click(function(e){
        //     e.preventDefault();

        //   var category_id = $('#category').val();
        //   var sub_id      = $('#sub_category').val();
        //   var uom         = $('#mou').val();
        //   var pack_size   = $('#pack_size').val();

        //     $.ajax({
        //         url: '{{ url("search") }}',
        //         type: 'post',
        //         data: {

        //               "category_id": category_id,
        //               "sub_id": sub_id,
        //               "uom": uom,
        //               "pack_size":pack_size,
        //               "_token":"{{ csrf_token() }}",
        //               },

        //             dataType: 'JSON',
        //             success: function(response){

        //               var data = response;
        //               if(data != ""){

        //                   $('#products').empty().append(data);
        //               }else{
        //                   $('#products').empty().append(` <tr>
        //                   <td colspan="8" style="text-align:center;">No Products Available..!!</td>
        //               </tr>`);
        //               }

        //             }
        //      });



        // });

    });
</script>
@endsection



