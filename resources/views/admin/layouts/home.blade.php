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
		<link href="{{ asset('css/icons.html') }}" rel="stylesheet">

		<!---Fontawesome css-->
		<link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

		<!---Ionicons css-->
		<link href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

		<!---Typicons css-->
		<link href="{{ asset('plugins/typicons.font/typicons.css') }}" rel="stylesheet">

		<!---Feather css-->
		<link href="{{ asset('plugins/feather/feather.css') }}" rel="stylesheet">

		<!---Falg-icons css-->
        <link href="{{ asset('plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

		
		<!---Style css-->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style-dark.css') }}" rel="stylesheet">

        <!-- skin css-->
        <link href="{{ asset('css/skin-modes.css') }}" rel="stylesheet">

		<!--- Animations css-->
		<link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    </head>
	<body class="main-body">

		<!-- Loader -->
		<div id="global-loader" class="light-loader">
			<img src="{{ asset('img/loaders/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
        <!-- /Loader -->

        @yield('contents')

		<!-- JQuery min js -->
		<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap Bundle js -->
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Ionicons js -->
		<script src="{{ asset('plugins/ionicons/ionicons.js') }}"></script>

		<!-- Moment js -->
		<script src="{{ asset('plugins/moment/moment.js') }}"></script>

		<!-- eva-icons js -->
		<script src="{{ asset('js/eva-icons.min.js') }}"></script>

		<!-- Rating js-->
		<script src="{{ asset('plugins/rating/jquery.rating-stars.js') }}"></script>
		<script src="{{ asset('plugins/rating/jquery.barrating.js') }}"></script>

		
		<!-- Custom js -->
		<script src="{{ asset('js/custom.js') }}"></script>

	</body>
</html>
