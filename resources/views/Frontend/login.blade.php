<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon shortcut" href="{{url('public/images/page_logo.png')}}" type="x-icon/gif">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="{{url('public/css/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/css/login/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/css/login/main.css')}}">
	<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url({{url('public/images/bg_3.jpg')}});">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30 ftco-animate">
			<form class="login100-form validate-form" action="{{route('sign_in')}}" method="POST">
				@csrf
				<span class="login100-form-title p-b-37">
					Đăng nhập
				</span>
				<div class=" m-b-20">
					<div class="wrap-input100 validate-input" data-validate="Enter username or email">
						<input class="input100" type="text" name="username" placeholder="Tên đăng nhập hoặc email">
						<span class="focus-input100"></span>
					</div>
					@if($errors->has('username'))
					<div class="help-block text-danger text-center">
						<small>{{$errors->first('username')}}</small>
					</div>
					@endif
					@if(Session::has('error'))
					<div class="help-block text-danger text-center">
						<small>{{Session::get('error')}}</small>
					</div>
					@endif
				</div>
				<div class=" m-b-25">
					<div class="wrap-input100 validate-input" data-validate = "Enter password">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100"></span>
					</div>
					@if($errors->has('password'))
					<div class="help-block text-danger text-center">
						<small>{{$errors->first('password')}}</small>
					</div>
					@endif
				</div>
				<div class="form-group">
					<div class="checkbox text-muted text-center">
						<label>
							<input type="checkbox" value="" name="keep_login">
							Duy trì đăng nhập
						</label>
					</div>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Đăng Nhập
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Hoặc đăng nhập với
					</span>
				</div>

				<div class="flex-c p-b-100">
					<a href="{{route('social_login',['provider' => 'facebook'])}}" class="login100-social-item" title="facebook">
						<i class="fa fa-facebook-f"></i>
					</a>
					<a href="#" class="login100-social-item" title="twitter">
						<i class="fa fa-twitter"></i>
					</a>

					<a href="{{route('social_login',['provider' => 'google'])}}" class="login100-social-item" title="google">
						<img src="{{url('public/images/icons/icon-google.png')}}" alt="GOOGLE">
					</a>
				</div>

				<div class="text-center">
					<a href="{{route('Customer.create')}}" class="txt2 hov1">
						Tôi chưa có tài khoản
					</a>
					<br>
					<a href="{{route('forgot_password')}}" class="txt2 hov1">
						Quên mật khẩu?
					</a>
				</div>
			</form>

			
		</div>
	</div>
	

	<!--===============================================================================================-->
	<script src="{{url('public/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{url('public/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{url('public/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{url('public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{url('public/js/jquery-migrate-3.0.1.min.js')}}"></script>
	<script src="{{url('public/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{url('public/js/jquery.stellar.min.js')}}"></script>
	<script src="{{url('public/js/owl.carousel.min.js')}}"></script>
	<script src="{{url('public/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{url('public/js/aos.js')}}"></script>
	<script src="{{url('public/js/scrollax.min.js')}}"></script>
	<script src="{{url('public/js/main.js')}}"></script>
</body>
</html>