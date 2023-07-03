<!-- Right-sidebar-->
<div class="sidebar sidebar-right sidebar-animate">
    <div class="p-3">
        <a href="#" class="text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
    </div>
    <div class="tab-menu-heading border-0 card-header">
        <div class="card-title mb-0">Notifications</div>
        <div class="card-options ml-auto">
            <a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
        </div>
    </div>
    <div class="tabs-menu ">
        <!-- Tabs -->
        <ul class="nav panel-tabs">
            <li class=""><a href="#tab" class="active show" data-toggle="tab">Profile</a></li>
            <li class=""><a href="#tab1" data-toggle="tab" class="">Friends</a></li>
            <li><a href="#tab2" data-toggle="tab" class="">Activity</a></li>
            <li><a href="#tab3" data-toggle="tab" class="">Todo</a></li>
        </ul>
    </div>
    <div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
        <div class="tab-content">
            <div class="tab-pane active" id="tab">
                <div class="card-body p-0">
                    <div class="header-user text-center mt-4">
                        <span class="avatar avatar-xxl brround mx-auto"><img src="assets/img/faces/5.jpg" alt="Profile-img" class="avatar avatar-xxl brround"></span>
                        <div class=" text-center font-weight-semibold user mt-3 h6 mb-0">Bill System Admin</div>
                        <span class="text-muted">Sales Rep.</span>
                        <div class="card-body">
                            <div class="form-group ">
                                <label class="form-label  text-left">Offline/Online</label>
                                <select class="form-control mb-4 nice-select " data-placeholder="Choose one">
                                    <option value="1">Online</option>
                                    <option value="2">Offline</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label text-left">Website</label>
                                <select class="form-control nice-select " data-placeholder="Choose one">
                                    <option value="1">billsystem.com</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <a class="dropdown-item  border-top" href="#">
                        <i class="dropdown-icon fe fe-edit mr-2"></i> Edit Profile
                    </a>
                    <a class="dropdown-item  border-top" href="#">
                        <i class="dropdown-icon fe fe-user mr-2"></i> Bill System
                    </a>
                    <a class="dropdown-item border-top" href="#">
                        <i class="dropdown-icon  fe fe-unlock mr-2"></i> Add Another Account
                    </a>
                    <a class="dropdown-item  border-top" href="#">
                        <i class="dropdown-icon fe fe-mail mr-2"></i> Message
                    </a>
                    <a class="dropdown-item  border-top" href="#">
                        <i class="dropdown-icon fe fe-help-circle mr-2"></i> Need Help?
                    </a>

                    <a class="dropdown-item  border-top" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>&nbsp;
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    
                    <div class="card-body border-top border-bottom"></div>
                </div>
            </div>
            <div class="tab-pane" id="tab1">
                <div class="chat">
                    <div class="contacts_card">
                        <div class="input-group mb-0 p-3">
                            <input type="text" placeholder="Search..." class="form-control search">
                            <div class="input-group-prepend mr-0">
                                <span class="input-group-text  search_btn  btn-primary"><i class="fa fa-search text-white"></i></span>
                            </div>
                        </div>
                        <ul class="contacts mb-0">
                            {{-- <li>
                                <div class="d-flex bd-highlight w-100">
                                    <div class="img_cont">
                                        <img src="assets/img/faces/11.jpg" class="rounded-circle user_img" alt="img">
                                    </div>
                                    <div class="user_info">
                                        <h5 class="mt-1 mb-1">Khadija Mehr</h5>
                                        <small class="text-muted">2hr ago</small>
                                    </div>
                                    <div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab2">
                {{-- <div class="list d-flex align-items-center border-bottom p-3 mt-3">
                    <div class="">
                        <span class="avatar bg-primary brround avatar-md">CH</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>New Websites is Created</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">30 mins ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
                 --}}
            </div>
            <div class="tab-pane" id="tab3">
                <div class="mt-3">
                    <div class="d-flex p-3">
                        <label class="custom-control custom-checkbox mb-0">
                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                            <span class="custom-control-label">Do Even More..</span>
                        </label>
                        <span class="ml-auto">
                            <a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
                            <a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
                        </span>
                    </div>
                    {{-- <div class="d-flex p-3 border-top">
                        <label class="custom-control custom-checkbox mb-0">
                            <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2" checked="">
                            <span class="custom-control-label">Find an idea.</span>
                        </label>
                        <span class="ml-auto">
                            <a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
                            <a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
                        </span>
                    </div> --}}
                    <div class="text-center pt-5">
                        <a href="#" class="btn btn-primary">Add more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Right-sidebar-closed -->