<?php

     $logo = DB::table('imagetable')
                ->where('table_name', 'logo')
                ->first();
?>

<header class="topbar" style="background:#313a46;">
    <div Class="container">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="col-md-12">
            <div class="row">

              <img src="{{asset($logo->img_path)}}" alt="admin-logo" width="100px;">


            </div>

          </div>



            <!-- ============================================================== -->
            <!-- Logo Ends -->
            <!-- ============================================================== -->

              <div class="row">


            <div class="navbar-header">


        </div>

      </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="top-bar-main">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <div class="float-left">
                    <ul class="navbar-nav">
                        <li class="nav-item "><a
                                    class="nav-link navbar-toggler sidebartoggler waves-effect waves-dark float-right"
                                    href="javascript:void(0)"><span class="navbar-toggler-icon"></span></a></li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       <!--  <li class="nav-item hidden-xs-down app-search">
                            <input type="text" class="form-control float-left" placeholder="Type for search...">
                        </li>
                    </ul>
                </div>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                @if(auth()->check())

                    <div class="float-right pr-3">
                        <ul class="navbar-nav my-lg-0 float-right">

                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- End mega menu -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->

                            <li class="nav-item dropdown u-pro">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="javascript;"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                                    @if(auth()->check())
                                        @if(empty(auth()->user()->profile->pic))
                                            <i class="fa fa-user-circle" style="color:white"></i>
                                         @else
                                          <i class="fa fa-user-circle"></i>
                                         @endif
                                    @endif

                                    <span class="circle-status"></span>
                                  </a>
                                <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                                    <ul class="dropdown-user">
                                        <li class="text-center">
                                            <div class="dw-user-box">
                                                <div class="u-img">

                                                    @if(empty(auth()->user()->profile->pic))
                                                        <i class="fa fa-user-circle fa-2x" style="color:white"></i>
                                                    @else
                                                        <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}"
                                                             alt="user-img">
                                                    @endif


                                                    <div class="clearfix"></div>
                                                    <div class="u-text">
                                                        <h4>{{auth()->user()->name}}</h4>

                                                        <p class="text-light"><span
                                                                    class="status-circle bg-success"></span>online
                                                            <i class="fas fa-chevron-down small"></i></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
										<!--
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#"><span class="status-circle bg-success"></span> online</a></li>
                                        <li><a href="#"><span class="status-circle bg-warning"></span> away</a></li>
                                        <li><a href="#"><span class="status-circle bg-danger"></span> not disturb</a>
                                        </li>
                                        <li><a href="#"><span class="status-circle bg-light"></span> offline</a></li>
                                        <li role="separator" class="divider"></li>
										-->
                                        <li><a href="{{url('admin/account/settings')}}"><i class="fas fa-user mr-1"></i> My Profile</a></li>
										<!--
                                        <li><a href="{{url('admin/account-settings')}}"><i class="fas fa-cog mr-1"></i>
                                                Settings</a></li>
												-->

                                        <li role="separator" class="divider"></li>
                                        <li>
                                            <a href="{{url('logout')}}">
                                                <i class="fas fa-sign-in-alt mr-1"></i>Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </li>

                        </ul>
                    </div>
                @else

                    <div class="float-right pr-3">
                        <ul class="navbar-nav my-lg-0 float-right">
                            <li class="nav-item">
                                <a class="nav-link " href="{{url('login')}}"><i class="fa fa-user"></i> Login</a>
                            </li>

                        </ul>
                    </div>
                @endif

                <div class="clearfix"></div>
            </div>
        </nav>
    </div>
</header>
