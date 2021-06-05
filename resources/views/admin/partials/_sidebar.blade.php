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
                    <img alt="" src="{{ asset('img/faces/5.jpg')}}"></div>
                    <h6>{{ Auth::user()->ftname }} {{ Auth::user()->ltname }}</h6>
                    <span>{{ findUserRole(Auth::user()->role_id)->role_name }}</span>
                </div>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.dashboard') }}">
                    <i class="side-menu__icon ti-dashboard"></i>
                    <span class="side-menu__label">Dashboard</span>
                </a>
            </li>

            <!--================== FINANCIAL SECTION ==================-->
             <!-- Transactions -->
            @if ( hasAccessTo(Auth::user()->email,2))
                <li><hr /></li>
            
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <i class="side-menu__icon ti-shopping-cart-full"></i>
                        <span class="side-menu__label">Transactions</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item" href="{{ url('/transactions/approved')}}">Approved 
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\Transactions', 'approved') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('/transactions/jackopool')}}">Jackopools
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\Transactions', 'jackopool') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('/transactions/wallet')}}">Wallet
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\Transactions', 'wallet') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('/transactions/filed_case')}}">Filed Case
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\Transactions', 'filed_case') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('/transactions/pending')}}">Pending
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\Transactions', 'pending') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('/transactions/canceled')}}">Canceled
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\Transactions', 'canceled') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('/transactions/reported')}}">Reported
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\Transactions', 'pending') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('//transaction_lump')}}">Lumps
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\LumpTransactions', 'pending') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('/usdt_transaction_lump')}}">USDT Lumps
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\UsdtLump', 'pending') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="{{ url('/eth_transaction_lump')}}">Eth Lumps
                                <span class="badge badge-warning side-badge">{{ getransCount('\App\Models\EthLump', 'pending') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
             
            <!-- Wallets -->
            @if ( hasAccessTo(Auth::user()->email,1))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-wallet"></i>
                    <span class="side-menu__label">Wallets</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('wallet') }}">
                            List
                            <span class="badge badge-warning side-badge">
                                {{ getransCount('\App\Models\WalletPool', 'pending') }}
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Customers -->
            @if ( hasAccessTo(Auth::user()->email,7))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-user"></i>
                    <span class="side-menu__label">Customers</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.users.list')}}">Customer List
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            
            
             <!-- Payments -->
             @if ( hasAccessTo(Auth::user()->email,3))
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <i class="side-menu__icon ti-credit-card"></i>
                        <span class="side-menu__label">Payments</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item" href="#">
                                Pending
                                <span class="badge badge-warning side-badge">0</span>
                            </a>
                        </li>
                        <li>
                            <a class="slide-item" href="#">
                                Completed
                                <span class="badge badge-warning side-badge">0</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <!-- Bank Accounts -->
            @if ( hasAccessTo(Auth::user()->email,6))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-home"></i>
                    <span class="side-menu__label">Bank Accounts</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="#">
                            List
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            
            <!--================== ADMIN SECTION ==================-->
            @if ( hasAccessTo(Auth::user()->email,5))
            <li><hr /></li>
            <!-- Users -->
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-user"></i>
                    <span class="side-menu__label">Admin Staff</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    {{-- <li><a class="slide-item" href="{{ route('user.addnew') }}">Add New User</a></li> --}}
                    
                    <li>
                        <a class="slide-item" href="{{ route('staff.list') }}">Staff List
                            <span class="badge badge-warning side-badge">
                                {{ countRecords('admins') }}
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            
            <!-- User Roles -->
            @if ( hasAccessTo(Auth::user()->email,5))
              <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-files"></i>
                    <span class="side-menu__label">Admin Access</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    {{-- <li><a class="slide-item" href="{{ route('module.addnew') }}">Add New Module</a></li>
                    <li><a class="slide-item" href="{{ route('roles.addnew') }}">Add New Role</a></li> --}}
                    
                    <li>
                        <a class="slide-item" href="{{ route('roles.list') }}">Roles
                            <span class="badge badge-warning side-badge">
                                {{ countRecords('admin_roles') }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('module.list') }}">Access Modules
                            <span class="badge badge-warning side-badge">
                                {{ countRecords('admin_modules') }}
                            </span>
                        </a>
                    </li>
                </ul>
            </li> 

            <li><hr /></li>
            <!--================== ADMIN SECTION ==================-->
            @endif 
          
            <!-- Messages -->
            @if ( hasAccessTo(Auth::user()->email,8))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-email  menu-icons"></i>
                    <span class="side-menu__label">Messages</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="#">Mail</a></li>
                </ul>
            </li>
            @endif

            <!-- Settings -->
            @if ( hasAccessTo(Auth::user()->email,9))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-settings"></i>
                    <span class="side-menu__label">Settings</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="#">
                            List
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Charts -->
            @if ( hasAccessTo(Auth::user()->email,10))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-pie-chart"></i>
                    <span class="side-menu__label">Charts</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="#">
                            List
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

             <!-- Security -->
             @if ( hasAccessTo(Auth::user()->email,11))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon ti-list-ol"></i>
                    <span class="side-menu__label">Security</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="#">
                            List
                            <span class="badge badge-warning side-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

        </ul>
    </div>
</aside>
<!-- main-sidebar -->