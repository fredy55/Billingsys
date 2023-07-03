<!-- main-sidebar opened -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll ">
    <div class="main-sidebar-header">
       <a class=" desktop-logo logo-dark" href="{{ route('admin.dashboard') }}">
           <img src="{{ asset('img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo2">
        </a>
    </div>
    
    <div class="main-sidebar-body circle-animation ">
        <ul class="side-menu circle">

            <!-- User profile -->
            <li class="slide">
                <div class="main-header-profile header-img">
                    <div class="main-img-user">
                    <img alt="" src="{{ asset('img/profile.jpg')}}"></div>
                    {{-- <h6>{{ Auth::user()->ftname }} {{ Auth::user()->ltname }}</h6> --}}
                    {{-- <span>{{ findUserRole(Auth::user()->role_id)->role_name }}</span> --}}
                </div>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.dashboard') }}">
                    <i class="side-menu__icon ti-dashboard"></i>
                    <span class="side-menu__label">Dashboard</span>
                </a>
            </li>

            <!-- Services -->
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-shopping-cart-full"></i>
                    <span class="side-menu__label">Services</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('service.list') }}">
                            Service List 
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('service.category.list') }}">
                            Category 
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Clients-->
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-user"></i>
                    <span class="side-menu__label">Clients</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('clients.list') }}">
                            Client List 
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                    <li>
                        {{-- <a class="slide-item" href="{{ route('clients.subscriptions') }}">
                            Subscriptions
                            <span class="badge badge-warning side-badge">0</span>
                        </a> --}}
                    </li>
                </ul>
            </li>

            <!-- Billing -->
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-credit-card"></i>
                    <span class="side-menu__label">Billing</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    {{-- <li>
                        <a class="slide-item" href="{{ route('bills.list') }}">
                            Billing List
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li> --}}
                    <li>
                        <a class="slide-item" href="{{ route('bills.list') }}">
                            Invoices
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('bills.list') }}">
                            Receipts 
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Companies -->
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-home"></i>
                    <span class="side-menu__label">Companies</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('company.list') }}">
                            Company List 
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->