<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quên mật khẩu</title>
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
	
	
	<div class="container-login100" style="background-image: url({{url('public/images/bg_1.jpg')}});">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30 ftco-animate">
			
			@if(Session::has('checked'))
			<form class="login100-form validate-form" action="{{route('change')}}" method="POST">
				@csrf
				<span class="login100-form-title p-b-37">
					Hãy nhập vào mật khẩu bạn muốn!
				</span>
				<div class=" m-b-20">
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu mới">
						<span class="focus-input100"></span>
					</div>
					@if($errors->has('password'))
					<div class="help-block text-danger text-center">
						<small>{{$errors->first('password')}}</small>
					</div>
					@endif
				</div>
				<div class=" m-b-20">
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
						<span class="focus-input100"></span>
					</div>
					@if($errors->has('password_confirmation'))
					<div class="help-block text-danger text-center">
						<small>{{$errors->first('password_confirmation')}}</small>
					</div>
					@endif
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit">
						Đổi mật khẩu!
					</button>
				</div>
			</form>
			@else
			<form class="login100-form validate-form" action="{{route('verify')}}" method="POST">
				<span class="login100-form-title p-b-37">
					<b>Chúng tôi cần biết chắc chắn đó là bạn.</b>
					<small>Nhập vào mật khẩu cũ của bạn!</small>
				</span>
				@csrf
				<div class=" m-b-20">
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="verify" placeholder="Mật khẩu của tôi là...">
						<span class="focus-input100"></span>
					</div>
					@if($errors->has('verify'))
					<div class="help-block text-danger text-center">
						<small>{{$errors->first('verify')}}</small>
					</div>
					@endif
					@if(Session::has('verify'))
					<div class="help-block text-danger text-center">
						<small>{{Session::get('verify')}}</small>
					</div>
					@endif
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit">
						Tiếp theo
					</button>
				</div>
			</form>
			@endif
			
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