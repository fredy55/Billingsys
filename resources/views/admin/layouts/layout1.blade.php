<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Xino - Laravel Admin & Dashboard Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="cryptocurrency, dashboard, admin, crypto, ico, bootstrap admin template, admin template, bootstrap dashboard template, crypto dashboard, cryptocurrency dashboard, ico dashboard, crypto admin, dashboard cryptocurrency, cryptocurrency trading dashboard, crypto dashboard template "/>
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Title -->
        <title> {{ env('APP_NAME') }} | @yield('title')</title>

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="{{ asset('plugins/icons/icons.css') }}" rel="stylesheet">

		<!--  Right-sidemenu css -->
		<link href="{{ asset('plugins/sidebar/sidebar.css') }}" rel="stylesheet">

		<!--- Animations css-->
		<link href="{{ asset('css/animate.css') }}" rel="stylesheet">

		<!--  Custom Scroll bar-->
		<link href="{{ asset('plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet"/>

		<!--  Left-Sidebar css -->
		<link href="{{ asset('css/sidemenu.css') }}" rel="stylesheet" />

		<!-- Internal  Data table css -->
		<link href="{{ asset('plugins/datatable/css/jquery.dataTables2.min.css') }}" rel="stylesheet">
		
		<!-- style css-->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">

		<!-- skin css-->
		<link href="{{ asset('css/skin-modes.css') }}" rel="stylesheet">

		<!-- dark-theme css-->
		<link href="{{ asset('css/style-dark.css') }}" rel="stylesheet">

		<!-- Internal  Data table css -->
		<link href="{{ asset('plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">

	</head>
	
	<body class="main-body app sidebar-mini Light-mode">
         <!-- Loader -->
		<div id="global-loader" class="light-loader">
			<img src="{{ asset('img/loaders/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
        
		<!-- Page -->
		<div class="page">
            <!-- Sidebar Nav-->
			@include('admin.partials._sidebar')

			<!-- main-content -->
		    <div class="main-content app-content">
				 <!-- main-header -->
				 @include('admin.partials._nav')

				 <!-- mobile-header -->
				 @include('admin.partials._mobilenav')

                 @yield('contents')
				 
			</div>
             <!-- main-content closed -->
             
			 <!-- User profile -->
			 @include('admin.partials._profile')

			 <!-- Footer opened -->
			 @include('admin.partials._footer')
		</div>
		
		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="la la-chevron-up"></i></a>
		
		
		<!-- Jquery js-->
		<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap js-->
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Ionicons js-->
		<script src="{{ asset('plugins/ionicons/ionicons.js') }}"></script>

		<!-- Moment js -->
		<script src="{{ asset('plugins/moment/moment.js') }}"></script>

		<!-- P-scroll js -->
		<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('plugins/perfect-scrollbar/p-scroll.js') }}"></script>

		<!-- Rating js-->
		<script src="{{ asset('plugins/rating/jquery.rating-stars.js') }}"></script>
		<script src="{{ asset('plugins/rating/jquery.barrating.js') }}"></script>

		<!-- Custom Scroll bar Js-->
		<script src="{{ asset('plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

		<!-- eva-icons js -->
		<script src="{{ asset('js/eva-icons.min.js') }}"></script>

		<!-- Sidebar js -->
		<script src="{{ asset('plugins/side-menu/sidemenu.js') }}"></script>

		<!-- Right-sidebar js -->
		<script src="{{ asset('plugins/sidebar/sidebar.js') }}"></script>
		<script src="{{ asset('plugins/sidebar/sidebar-custom.js') }}"></script>

		<!-- Sticky js-->
		<script src="{{ asset('js/sticky.js') }}"></script>

		<!-- Internal Data tables -->
		<script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/jszip.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/vfs_fonts.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/buttons.colVis.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>

		<!-- Internal Datatable js -->
		<script src="{{ asset('js/table-data.js') }}"></script>
		
		<!-- Internal Data tables -->
		@yield('scripts')

		<!-- Custom js-->
		<script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>




