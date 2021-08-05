<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		
		<!-- Title -->
        <title>@yield('title')</title>

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/x-icon"/>

		<!-- Icons css -->
		<link rel="stylesheet" href="{{ asset('css/invoice.css') }}" media="all" />
	</head>
	
	<body>
        @yield('contents')
    </body>
</html>




