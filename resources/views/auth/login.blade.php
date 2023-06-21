@extends('layouts.app')

@section('content')
<!-- start loader >
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <end loader -->

	<!-- Start wrapper-->
		<div id="wrapper">
			<div class="loader-wrapper">
				<div class="lds-ring">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
			<div class="card card-authentication1 mx-auto my-5">
				<div class="card-body">
					<div class="card-content p-2">
						<div class="text-center">
							<img src="{{asset('images/logo2.png')}}" alt="logo icon">
						</div>
						<div class="card-title text-uppercase text-center py-3">Login</div>
							<form method="POST" action="{{ route('login') }}">
								@if(Session::get('info'))
									<div class="alert alert-success p-3">
										{{Session::get('info')}}
									</div>
								@endif
								@if (session('error'))
									<div class="alert alert-danger p-3">
										{{ session('error') }}
									</div>
								@endif

								@csrf
								<div class="form-group">
									<label for="exampleInputUsername" class="sr-only">Email</label>
									<div class="position-relative has-icon-right">
										<input type="email" id="exampleInputUsername" class="form-control input-shadow @error('email') is-invalid @enderror" placeholder="Entrer votre email" name="email" value="{{ Session::get('verifiedEmail') ? Session::get('verifiedEmail') : old('email') }}" required autocomplete="email" autofocus>
										<div class="form-control-position">
											<i class="icon-user"></i>
										</div>
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword" class="sr-only">Mot de passe</label>
									<div class="position-relative has-icon-right">
										<input type="password" id="exampleInputPassword" class="form-control input-shadow @error('password') is-invalid @enderror" placeholder="Entrer votre mot de passe" name="password" required autocomplete="current-password">
										<div class="form-control-position">
											<i class="icon-lock"></i>
										</div>
										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="form-row">
									
									<div class="form-group col-12 text-right">
										@if (Route::has('password.request'))
											<a href="{{ route('password.request') }}">Réinitialiser mot de passe</a>
										@endif
									</div>
								</div>
								<button type="submit" class="btn btn-light btn-block">Connexion</button>
								<div class="text-center mt-3">Se connecter avec</div>
								
								<div class="form-row mt-4">
								<div class="form-group mb-0 col-6">
								<button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
								</div>
								<div class="form-group mb-0 col-6 text-right">
								<button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
								</div>
								</div>
							
							</form>
					</div>
				</div>
				<div class="card-footer text-center py-3">
					<p class="text-warning mb-0">Vous n'avez pas de compte? <a href="{{route('register')}}" > Inscrivez-vous ici</a></p>
				</div>
			</div>
			<!--Start Back To Top Button-->
			<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
			<!--End Back To Top Button-->
		</div>
	<!--wrapper-->

@endsection