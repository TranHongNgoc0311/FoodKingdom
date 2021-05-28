<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

	<title>Log in Administrator</title>
    <link rel="icon shortcut" href="{{url('public/images/icons/admin.png')}}" type="x-icon/gif">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!--external css-->
	<link rel="stylesheet" href="{{url('public/fonts/font-awesome/css/font-awesome.css')}}" />

	<!-- Custom styles for this template -->
	<link href="{{url('public/css/Backend/style.css')}}" rel="stylesheet">
	<link href="{{url('public/css/Backend/style-responsive.css')}}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<style>
.form-login {
	max-width: 400px;
	margin: 200px auto 0;
}
.help-block{
	color: #FD0C0C;
}
</style>
<body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

      <div id="login-page">
      	<div class="container">

      		<form class="form-login" action="{{route('login')}}" method="POST">
      			@csrf
      			<h2 class="form-login-heading" style="background-image: url({{url('public/images/bg_4.jpg')}});background-size: cover;">Đăng nhập quản trị</h2>
      			<div class="login-wrap">
      				<input type="text" class="form-control" name="code" placeholder="Mã ID" autofocus>
      				@if($errors->has('code'))
					<div class="help-block">
						{{$errors->first('code')}}
					</div>
      				@endif
      				<br>
      				<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
      				@if($errors->has('password'))
					<div class="help-block">
						{{$errors->first('password')}}
					</div>
      				@endif
      				<div class="checkbox">
      					<label>
      						<input type="checkbox" name="remember-me">
      						Giữ phiên
      					</label>
      				</div>
      				<button class="btn btn-theme btn-block" type="submit" style="background-image: url({{url('public/images/bg_4.jpg')}});background-size: cover;">
      					<i class="fa fa-lock"></i> SIGN IN
      				</button>

      			</div>

      			<!-- Modal -->
      			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      				<div class="modal-dialog">
      					<div class="modal-content">
      						<div class="modal-header">
      							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      							<h4 class="modal-title">Forgot Password ?</h4>
      						</div>
      						<div class="modal-body">
      							<p>Enter your e-mail address below to reset your password.</p>
      							<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

      						</div>
      						<div class="modal-footer">
      							<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
      							<button class="btn btn-theme" type="button">Submit</button>
      						</div>
      					</div>
      				</div>
      			</div>
      			<!-- modal -->

      		</form>	  	

      	</div>
      </div>

      <!-- jQuery 3 -->
      <script src="//code.jquery.com/jquery.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

      <!--BACKSTRETCH-->
      <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
      <script type="text/javascript" src="{{url('public/js/Backend/jquery.backstretch.min.js')}}"></script>
      <script>
      	$.backstretch("{{url('public/images/bg_3.jpg')}}", {speed: 500});
      </script>


  </body>
  </html>
