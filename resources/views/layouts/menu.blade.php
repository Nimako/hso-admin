

   <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{url('dashboard')}}" class="logo">
                        <i class="zmdi zmdi-group-work icon-c-logo"></i>
                        <span>HISENSE HSO</span> | <small>{{ ucfirst(Auth()->user()->ShowRoomName) }} BRANCH </small>
                    </a>
                </div>
                <!-- End Logo container-->


                <div class="menu-extras navbar-topbar">

                    <ul class="list-inline float-right mb-0">


                        <li class="list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                       

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('lib/assets/images/users/avatar-1.jpg')}}" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small> Welcome {{ ucfirst(Auth()->user()->FullName) }} </small> </h5>
                                </div>

                                <!-- item-->
                                <a href="{{url('logout')}}" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                </div> <!-- end menu-extras -->
                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->


        <div class="navbar-custom">
            <div class="container">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li>
                            <a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>

                        <li>
                            <a href="{{ url('/orders/submitted') }}"><i class="zmdi zmdi-collection-text"></i> <span> Submitted orders</span> </a>
                        </li>

                        <li>
                            <a href="{{ url('/orders/draft') }}"><i class="zmdi zmdi-collection-text"></i> <span> Draft orders </span> </a>
                        </li>

                        <li>
                            <a href="{{ url('/orders/completed') }}"><i class="zmdi zmdi-collection-text"></i> <span> Completed orders </span> </a>
                        </li>

                        {{-- <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-collection-text"></i><span> Bills </span> </a>
                                <ul class="submenu">
                                    <li><a href="{{ url('/bills') }}">Create Bill</a></li>
                                    <li><a href="{{ url('/bill-list') }}">Bill List</a></li>
                                    <li><a href="{{ url('/payment-list') }}">Payments</a></li>
                                </ul>
                        </li> --}}

                        {{-- <li>
                            <a href="{{ url('/collectors') }}"><i class="zmdi zmdi-assignment-account"></i> <span> Collectors </span> </a>
                        </li> --}}

                        <?php if(Auth()->user()->UserType !="ADMIN"): ?>

                        <li class="float-right">
                            <div class="btn-group float-right m-t-15">
                                <button type="button" class="btn btn-success btn-custom dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                <div class="dropdown-menu dropdown-menu-right " x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-59px, -136px, 0px);">
                                      <a class="dropdown-item" href="{{ url('/registration') }}">USER MANAGEMENT</a>
                                </div>

                            </div>
                        </li>
                        <?php endif; ?>


                    </ul>
                    <!-- End navigation menu  -->
                </div>
            </div>
        </div>
    </header>
    <!-- End Navigation Bar-->



