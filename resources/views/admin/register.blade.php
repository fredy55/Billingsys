@extends('admin.layouts.home')

@section('contents')
	<!-- main-signin-wrapper -->
	<div class="my-auto page page-h">
		<div class="main-signin-wrapper">
			<div class="main-card-signin d-md-flex wd-100p">
			<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
				<div class="my-auto authentication-pages">
					<div>
						<img src="{{ asset('img/brand/logo-white.png') }}" class="m-0 mb-4" alt="logo">
						<h5 class="mb-4">Responsive Modern Dashboard &amp; Admin Template</h5>
						<p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>
						<a href="index.html" class="btn btn-danger">Learn More</a>
					</div>
				</div>
			</div>
			<div class="sign-up-body wd-md-50p">
				<div class="main-signin-header">
					<h2>Welcome back!</h2>
					<h4>Please Register with Mintro</h4>
					<form method="POST" action="{{ route('user.saveuser') }}">
                        @csrf

						<div class="form-group">
							<label>Firstname &amp; Lastname</label> 
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
							
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label>Email</label> 
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
						    
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label>Password</label> 
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						
						<div class="form-group">
							<label>Confirm Password</label> 
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
						</div>
						
						<button class="btn btn-main-primary btn-block">Create Account</button>
					</form>
				</div>
				{{-- <div class="main-signup-footer mg-t-10">
					<p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
				</div> --}}
				</div>
			</div>
		</div>
	</div>
	<!-- /main-signin-wrapper -->
@endsection