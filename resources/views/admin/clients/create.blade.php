@extends('admin.layouts.layout1')

<!-- Website title -->
@section('title', 'Add Clients')

@section('contents')
    <!-- container -->
    <div class="container-fluid">	
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Add Clients</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Clients Info</span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('clients.list') }}" type="button" class="btn btn-primary btn-md">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <!-- breadcrumb -->

        <!-- row opened -->
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Create New Clients</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Mintro Simple Table. <a href="#">Learn more</a></p> --}}
                    </div>

                    <div class="card-body pd-20 pd-md-20">
                        
                        @include('inc.flashmsg')

                         <form method="POST" action="{{ route('clients.save') }}">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Clients Name</label> 
                                        <input name="ctname" type="text" class="form-control" placeholder="Clients Name" required autofocus />
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Host Company</label> 
                                        <select name="compinfo" class="form-control" required>
                                            <option value="">-- Select Company ---</option>
                                            
                                            @foreach ($compInfo as $item)
                                                <option value="{{ $item->id }}">{{ $item->ctname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Email</label> 
                                        <input name="email" type="email" class="form-control" placeholder="Email email address" required />
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Phone Number</label> 
                                        <input name="phone" type="number" class="form-control" placeholder="+234 (803) xxxxxxx" required />
                                     </div>
                                </div>

                            </div>

                             <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Address Line 1</label> 
                                        <input name="address1" type="text" class="form-control" placeholder="Street/Layout" required />
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>City</label> 
                                        <input name="city" type="text" class="form-control" placeholder="Town/City" required />
                                     </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>State</label> 
                                        <input name="state" type="text" class="form-control" placeholder="State/province" required />
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Country</label> 
                                        <input name="country" type="text" class="form-control" placeholder="Country" required />
                                     </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                    <div class="col-md-4 col-lg-4 col-xs-12">
                                        <button class="btn btn-main-primary btn-block">Save Client</button>                               
                                    </div>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <!--/div-->

        </div>
        <!-- /row -->


        </div>
        <!-- Container closed -->
@endsection