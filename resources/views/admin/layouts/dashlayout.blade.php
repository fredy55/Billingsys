<!DOCTYPE html>
<html lang="en">
    <head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Xino - Laravel Admin & Dashboard Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="cryptocurrency, dashboard, admin, crypto, ico, bootstrap admin template, admin template, bootstrap dashboard template, crypto dashboard, cryptocurrency dashboard, ico dashboard, crypto admin, dashboard cryptocurrency, cryptocurrency trading dashboard, crypto dashboard template "/>

		<!-- Title -->
        <title> {{ env('APP_NAME') }} | @yield('title') </title>

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
		<link href="{{ asset('css/sidemenu.css') }}" rel="stylesheet">

		
		<!-- Internal Chart-Morris css-->
        <link href="{{ asset('plugins/morris.js/morris.css') }}" rel="stylesheet">

		<!-- Internal Nice-select css  -->
		<link href="{{ asset('plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet"/>

		<!-- Internal News-Ticker css-->
		<link href="{{ asset('plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

		<!-- Jquery-countdown css-->
		<link href="{{ asset('plugins/jquery-countdown/countdown.css') }}" rel="stylesheet">

		<!-- Internal News-Ticker css-->
        <link href="{{ asset('plugins/newsticker/jquery.jConveyorTicker.css') }}" rel="stylesheet" />


		<!-- style css-->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">

		<!-- skin css-->
		<link href="{{ asset('css/skin-modes.css') }}" rel="stylesheet">

		<!-- dark-theme css-->
		<link href="{{ asset('css/style-dark.css') }}" rel="stylesheet">

        <!-- Switcher css -->
		<link href="{{ asset('switcher/css/switcher.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('switcher/demo.cs') }}s">


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
		<!-- Datepicker js -->
        <script src="{{ asset('plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

		<!--Chart bundle min js -->
		<script src="{{ asset('plugins/chart.js/Chart.bundle.min.js') }}"></script>
		<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
		<script src="{{ asset('plugins/peity/jquery.peity.min.js') }}"></script>

		<!-- JQuery sparkline js -->
		<script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- Sampledata js -->
		<script src="{{ asset('js/chart.flot.sampledata.js') }}"></script>
        
		<!-- Perfect-scrollbar js -->
		<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('plugins/perfect-scrollbar/p-scroll.js') }}"></script>
		<!-- Internal  Flot js-->
		<script src="{{ asset('plugins/jquery.flot/jquery.flot.js') }}"></script>
		<script src="{{ asset('plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
		<script src="{{ asset('plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
		<script src="{{ asset('js/dashboard.sampledata.js') }}"></script>
		<script src="{{ asset('js/chart.flot.sampledata.js') }}"></script>
		<!-- Internal Newsticker js-->
		<script src="{{ asset('plugins/newsticker/jquery.jConveyorTicker.js') }}"></script>
        <script src="{{ asset('js/newsticker.js') }}"></script>
		<!-- Internal Nice-select js-->
		<script src="{{ asset('plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
        <script src="{{ asset('plugins/jquery-nice-select/js/nice-select.js') }}"></script>
		<!-- index js -->
		<script src="{{ asset('js/dashboard.js') }}"></script>
		<!-- Custom js-->
		<script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>




