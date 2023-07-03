@extends('admin.layouts.home')

@section('title','Admin Login')

@section('contents')
	<!-- main-signin-wrapper -->
	<div class="my-auto page page-h">
		<div class="main-signin-wrapper">
			<div class="main-card-signin d-md-flex wd-100p">
			<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
				<div class="my-auto authentication-pages">
					<div>
						<img src="{{ asset('img/brand/logo-white.png') }}" class=" m-0 mb-4" alt="logo">
						<h5 class="mb-4">Keeping records of client transactions...</h5>
						{{-- <p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> --}}
						<a href="index.html" class="btn btn-danger">Learn More</a>
					</div>
				</div>
			</div>
			
			<div class="p-5 wd-md-50p">
				<div class="main-signin-header">
					<h2>Welcome back!</h2>
					<h4>Please sign in to continue</h4>
					<form method="POST" action="{{ route('home.login') }}">
                        @csrf

						<div class="form-group">
							<label>Email</label>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
						
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						
						<div class="form-group">
							<label>Password</label> 
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
						    
							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<button class="btn btn-main-primary btn-block">Sign In</button>
					</form>
				</div>
				<div class="main-signin-footer mt-3 mg-t-5">
					<p><a href="#">Forgot password?</a></p>
					{{-- <p>Don't have an account? <a href="{{ route('register') }}">Create an Account</a></p> --}}
				</div>
			</div>
		</div>
		</div>
	</div>
	<!-- /main-signin-wrapper -->
@endsection