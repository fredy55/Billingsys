<!-- main-header -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
            </div>
            <div class="main-header-center ml-3 d-sm-none d-md-none d-lg-block">
                <input type="search" class="form-control" placeholder="Search for anything...">
                <button class="btn"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="main-header-center">
            <div class="responsive-logo">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('img/brand/logo.png') }}" class="mobile-logo" alt="logo" />
                    <img src="{{ asset('img/brand/logo-white.png') }}" class="mobile-logo" alt="logo2">
                </a>
            </div>
        </div>
        <div class="main-header-right">
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <form class="navbar-form nav-item my-auto d-lg-none" role="search">
                    <div class="input-group nav-item my-auto">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="reset" class="btn btn-default">
                                <i class="ti-close"></i>
                            </button>
                            <button type="submit" class="btn btn-default nav-link">
                                <i class="ti-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><i class="ti-fullscreen"></i></span></a>
                </div>

                <div class="dropdown  nav-item main-header-message ">
                    <a class="new nav-link" href="#" ><i class="ti-email"></i><span class="pulse-danger"></span></a>
                    <div class="dropdown-menu dropdown-menu-arrow animated fadeInUp ">
                        <div class="main-dropdown-header  d-sm-none">
                            <a class="main-header-arrow" href="#"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="menu-header-content text-left d-flex">
                            <div class="">
                                <h6 class="menu-header-title text-white mb-0">01 new Messages</h6>
                            </div>
                            <div class="my-auto ml-auto">
                                <span class="badge badge-pill badge-warning float-right">Mark All Read</span>
                            </div>
                        </div>
                        <div class="main-message-list chat-scroll">
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  " data-image-src="assets/img/faces/3.jpg">
                                    <span class="avatar-status bg-teal"></span>
                                </div>

                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Bill System</h5>
                                        <p class="time mb-0 text-right ml-auto float-right">10 min ago</p>
                                    </div>
                                    <p class="mb-0 desc">We are currently upgrading the admin...</p>
                                </div>
                            </a>
                            
                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="text-center.html">VIEW ALL</a>
                        </div>
                    </div>
                </div>

                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link " href="#"><i class="ti-bell animated bell-animations"></i><span class=" pulse"></span></a>
                    <div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
                        <div class="menu-header-content text-left d-flex">
                            <div class="">
                                <h6 class="menu-header-title text-white mb-0">2 new Notifications</h6>
                            </div>
                            <div class="my-auto ml-auto">
                                <span class="badge badge-pill badge-warning float-right">Mark All Read</span>
                            </div>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-success-transparent">
                                    <i class="la la-shopping-basket text-success"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="notification-label mb-1">Service Request</h5>
                                    <div class="notification-subtext">1 hour ago</div>
                                </div>
                                <div class="ml-auto" >
                                    <i class="las la-angle-right text-right text-muted"></i>
                                </div>
                            </a>
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-danger-transparent">
                                    <i class="la la-user-check text-danger"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="notification-label mb-1">22 verified sales</h5>
                                    <div class="notification-subtext">2 hour ago</div>
                                </div>
                                <div class="ml-auto" >
                                    <i class="las la-angle-right text-right text-muted"></i>
                                </div>
                            </a>
                            
                        </div>
                        <div class="dropdown-footer">
                            <a href="#">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                
                <button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical "></span>
                </button>

                <!-- User profile -->
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user" href="#"><img alt="" src="{{ asset('img/profile.jpg')}}"></a>
                    <div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
                        <a class="dropdown-item" href="#"><i class="far fa-user"></i> My Profile</a>
                        <a class="dropdown-item" href="#"><i class="far fa-edit"></i> Edit Profile</a>
                        <a class="dropdown-item" href="#"><i class="far fa-clock"></i> Activity Logs</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-sliders-h"></i> Account Settings</a>
                        
                        <!-- Logout link -->
                        <div>
                            {{-- <a class="dropdown-item" href="page-signin.html"><i class="fas fa-sign-out-alt"> Sign Out</a> --}}
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>&nbsp;
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        
                    </div>
                </div>

                <div class="dropdown main-header-message right-toggle">
                    <a class="nav-link " data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="ti-menu tx-20 bg-transparent"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->