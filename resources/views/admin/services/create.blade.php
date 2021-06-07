@extends('admin.layouts.layout1')

<!-- Website title -->
@section('title', 'Add Service')

@section('contents')
    <!-- container -->
    <div class="container-fluid">	
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Add Service</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Services</span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('service.list') }}" type="button" class="btn btn-primary btn-md">
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
                            <h4 class="card-title mg-b-0">Create New Service</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Mintro Simple Table. <a href="#">Learn more</a></p> --}}
                    </div>

                    <div class="card-body pd-20 pd-md-20">
                        
                        @include('inc.flashmsg')

                         <form method="POST" action="{{ route('service.save') }}">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Service Name</label> 
                                        <input id="servname" name="servname" type="text" class="form-control @error('modulegroup') is-invalid @enderror" value="{{ old('modulegroup') }}" required autocomplete="modulegroup" autofocus />
                                        
                                        @error('modulegroup')
                                            <span class="invalid-feedback" module="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Service Category</label> 
                                        <select id="servcat" name="servcat" class="form-control">
                                            <option value="">--- Select Category ---</option>
                                            
                                            @foreach ($services as $option)
                                                <option value="{{ $option->category_id }}">{{ $option->category }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Service Price</label> 
                                        <input id="servprice" name="servprice" type="text" class="form-control @error('modulegroup') is-invalid @enderror" value="{{ old('modulegroup') }}" required autocomplete="modulegroup" autofocus />
                                        
                                        @error('modulegroup')
                                            <span class="invalid-feedback" module="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Service Description</label> 
                                        <textarea id="servdesc" rows="3" name="servdesc" class="form-control @error('moduledesc') is-invalid @enderror" autocomplete="moduledesc"></textarea>
                                        
                                        @error('moduledesc')
                                            <span class="invalid-feedback" module="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-4 col-lg-4 col-xs-12">
                                        <button class="btn btn-main-primary btn-block">Save Service</button>                               
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