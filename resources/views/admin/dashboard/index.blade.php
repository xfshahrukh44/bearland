@extends('layouts.app')
@push('before-css')
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>

    <!-- Date picker plugins css -->
    <link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- page css -->
    <link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
@endpush

@push('after-css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- chart box one -->
        <!-- ============================================================== -->

   <div class="row">
            
      <div class="col-lg-12 col-md-12">
               
              <div class="row">
               
               <div class="col-md-3">

                  <a href="{{url('admin/users')}}"  style="color:white; text-decoration:none;">
                  <div class="card-analytics">

                  <div class="card-body-analytics" style="background-color:slateblue;">

                    <i class="fa fa-users" style="padding-top:40px;"></i>
                    @php $users = DB::table('users')->get()->count(); @endphp
                    <span>{{$users}}</span>
                 
                  </div>
                  </a>
                </div>

                </div>
                
                 <div class="col-md-3">

                  <a href="{{url('admin/contact/inquiries')}}"  style="color:white; text-decoration:none;">
                  <div class="card-analytics btn-danger">

                  <div class="card-body-analytics">
                    
                    @php $inquries = DB::table('inquiry')->get()->count(); @endphp    
                    <i class="fa fa-envelope" style="padding-top:40px;"></i>
                    <span>{{$inquries}}</span>
                  </div>
                  </a>
                </div>

                </div>
                
                

                
                <div class="col-md-3">

                  <a href="{{url('admin/order/list')}}"  style="color:white; text-decoration:none;" tooltip="users">
                  <div class="card-analytics" style="background-color:orange">

                  <div class="card-body-analytics">
                    @php $order_count = DB::table('orders')->get()->count(); @endphp
                    <i class="fa fa-shopping-cart" style="padding-top:40px;"></i>
                    <span>{{$order_count}}</span>
                  </div>
                  </a>
                </div>

                </div>
                
                
                
                 <div class="col-md-3">

                  <a href="{{url('admin/account/settings')}}"  style="color:white; text-decoration:none;">
                  <div class="card-analytics" style="background-color:aqua">

                  <div class="card-body-analytics">
                  
                   <i class="fa fa-cog" style="padding-top:40px;"></i>
                  </div>
                  </a>
                </div>

                </div>

            </div>
           
           
           <!--users list-->
           
           
           
            <div class="row" style="margin-top: 30px;">
            <div class="col-sm-12">
                <div class="white-box card">
                    <div class="card-body">
                        <h3 class="box-title pull-left">Users List</h3>
                        
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                   
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    
                                        
                                      
                                        @php $users = DB::table('users')->get(); @endphp
                                        
                                        @foreach($users as $key=>$user)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$user->name}}</td>
                                               
                                               <td></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
           
           
           
        </div>
        <!-- ============================================================== -->
        <!-- End chart box one -->
        <!-- chart box two -->
        <!-- ============================================================== -->

        @include('layouts.admin.footer')
    </div>
@endsection



@push('js')
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--c3 JavaScript -->
    <script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>
    <script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>
    <!--jquery knob -->
    <script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>
    <!--Sparkline JavaScript -->
    <script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Morris JavaScript -->
    <script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>
    <!-- Popup message jquery -->
    <script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>


    <script>
        // MAterial Date picker

        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
    </script>

    <!-- Vector map JavaScript -->
    <script src="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('plugins/vendors/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- Dashboard JS -->
    <script src="{{asset('assets/js/dashboard-shop-2.js')}}"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush
@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete', function (e) {
                if (confirm('Are you sure want to delete?')) {
                }
                else {
                    return false;
                }
            });
            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                "columns": [
                    null, null, null, {"orderable": false}
                ]
            });

        });
    </script>

@endpush
