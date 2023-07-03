@extends('admin.layouts.layout1')

@section('title','Admin Dashboard')

@section('contents')
	<!-- container -->
	<div class="container-fluid">
			
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between">
			<div class="left-content">
				<h3 class="content-title mb-2">Welcome back,</h3>
				<div class="d-flex">
					<i class="mdi mdi-home text-muted hover-cursor"></i>
					<p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
					<p class="text-primary mb-0 hover-cursor">Billings</p>
				</div>
			</div>
			{{-- <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
				<button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
			</div> --}}
		</div>
		<!-- /breadcrumb -->

	</div>
	<!-- Container closed -->
@endsection