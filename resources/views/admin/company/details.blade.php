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
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="">
                    <a class="main-header-arrow" href="#" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                    <div class="main-content-body main-content-body-contacts card custom-card">
                        <div class="main-contact-info-header pt-3">
                            <div class="media">
                                <div class="main-img-user">
                                    @if ($compinfo->img_url!=="nil")
                                       <img alt="avatar" src="{{ asset($compinfo->img_url) }}">
                                    @else
                                       <img alt="avatar" src="{{ asset('img/profile.jpg') }}"> 
                                    @endif
                                     <a href="#modaldemo8" data-effect="effect-flip-vertical" data-toggle="modal">
                                         <i class="fe fe-camera"></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5>{{ $compinfo->ctname }}</h5>
                                    <p>{{ $compinfo->cac_num }}</p>
                                    <nav class="contact-info">
                                        <a href="#" class="contact-icon border tx-inverse" data-toggle="tooltip" title="Call"><i class="fe fe-phone"></i></a>
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

    <!-- Modal effects -->
		<div class="modal" id="modaldemo8" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">
                            <img src="{{ asset('img/brand/logo.png') }}" alt="Company Logo" />
                            Company Logo Upload
                        </h6>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
                <form method="POST" action="{{ route('company.profile.update', ['id'=>$compinfo->id]) }}" enctype="multipart/form-data">
					
                    <div class="modal-body">
						<p>
                            
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <input name="image" id="profileimg" type="file" required />
                                    </div>
                                </div>
                            </div>
                        </p>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn ripple btn-primary" type="button">Upload Picture</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
                </form>
				</div>
			</div>
		</div>
		<!-- End Modal effects-->
@endsection

@section('scripts')
    
@endsection