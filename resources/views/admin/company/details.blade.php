@extends('admin.layouts.layout1')

<!-- Website title -->
@section('title', 'Company Info')

@section('contents')
    <!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Company Info</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">
                        <a href="{{ route('company.list') }}">/ Company Details</a>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('company.list') }}" type="button" class="btn btn-primary">
                    <i class="fa fa-arrow-left"></i> Go Back
                </a>
            </div>
        </div>
        <!-- breadcrumb -->
        @include('inc.flashmsg')
        
        <!-- row -->
        <div class="row row-sm">
            <div class="col-sm-12 col-md-12 col-xl-8">
                <div class="">
                    <a class="main-header-arrow" href="#" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                    <div class="main-content-body main-content-body-contacts card custom-card">
                        <div class="main-contact-info-header pt-3">
                            <div class="media">
                                <div class="main-img-user">
                                    <img alt="avatar" src="{{ asset('img/faces/6.jpg') }}"> <a href="#"><i class="fe fe-camera"></i></a>
                                </div>
                                <div class="media-body">
                                    <h5>{{ $compinfo->ctname }}</h5>
                                    <p>{{ $compinfo->cac_num }}</p>
                                    <nav class="contact-info">
                                        <a href="#" class="contact-icon border tx-inverse" data-toggle="tooltip" title="Call"><i class="fe fe-phone"></i></a>
                                        <a href="#" class="contact-icon border tx-inverse" data-toggle="tooltip" title="Video"><i class="fe fe-video"></i></a>
                                        <a href="#" class="contact-icon border tx-inverse" data-toggle="tooltip" title="message"><i class="fe fe-message-square"></i></a>
                                        <a href="#" class="contact-icon border tx-inverse" data-toggle="tooltip" title="Add to Group"><i class="fe fe-user-plus"></i></a>
                                        <a href="#" class="contact-icon border tx-inverse" data-toggle="tooltip" title="Block"><i class="fe fe-slash"></i></a>
                                    </nav>
                                </div>
                            </div>
                            <div class="main-contact-action btn-list pt-3 pr-3">
                                <a href="{{ route('company.edit', ['id'=>$compinfo->id]) }}" class="btn ripple btn-primary text-white btn-icon" data-placement="top" data-toggle="tooltip" title="Edit Profile"><i class="fe fe-edit"></i></a>
                                <a href="{{ route('company.delete', ['id'=>$compinfo->id]) }}" onclick="confirm('Do you want to delete this record?')" class="btn ripple btn-secondary text-white btn-icon" data-placement="top" data-toggle="tooltip" title="Delete Profile"><i class="fe fe-trash-2"></i></a>
                            </div>
                        </div>
                        <div class="main-contact-info-body p-4">
                            <div>
                                <h6><b>Company Address</b></h6>
                                <p>
                                    {{ $compinfo->addressln1 }}, 
                                    {{ $compinfo->city }}, 
                                    {{ $compinfo->state }}, 
                                    {{ $compinfo->country }}
                                </p>
                            </div>
                            <div class="media-list pb-0">
                                <div class="media">
                                    <div class="media-body">
                                        <div>
                                            <label>Work Phone1</label> 
                                            <span class="tx-medium">{{ $compinfo->phone_no }}</span>
                                        </div>
                                        <div>
                                            <label>Email</label> 
                                            <span class="tx-medium">{{ $compinfo->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body">
                                        <div>
                                            <label>Status</label> 
                                            <span class="tx-medium">{{ $compinfo->IsActive==1?'Active':'Inactive' }}</span>
                                        </div>
                                        <div>
                                            <label>Date Created</label> 
                                            <span class="tx-medium">{{ $compinfo->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body">
                                        <div>
                                            <label>Description</label> 
                                            <span class="tx-medium">...</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- Container closed -->
@endsection

@section('scripts')
    
@endsection