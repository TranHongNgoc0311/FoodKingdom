<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon shortcut" href="{{url('public/images/page_logo.png')}}" type="x-icon/gif">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="{{url('public/css/animate.css')}}">
  <link rel="stylesheet" href="{{url('public/fonts/font-awesome-4.7.0/css/font-awesome.css')}}" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('public/css/register/Frontend.css')}}">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="{{url('public/css/customer.css')}}">
  <link rel="stylesheet" href="{{url('public/vendor/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{url('public/vendor/jQueryUI/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{url('public/vendor/jQueryUI/datepicker.css')}}">
</head>
<style>
.txt2 {
  font-family: SourceSansPro-Regular;
  font-size: 16px;
  line-height: 1.4;
  color: #4b2354;
}
.radio{
  color: #4b2354;
}
.radio label{
  margin-left: 15px;
}
.help-block{
  color: #EF1818;
}
.container{
  width: 600px;
}
</style>
<body>
	
	
	<div class="main">

    <div class="container ftco-animate">
      <form method="POST" action="{{route('Customer.store')}}" class="appointment-form" id="appointment-form">
        <h2>Đăng ký khách hàng</h2>
        @if(Session::has('alert'))
        <div class="help-block" style="margin-bottom: 20px;">
          {{Session::get('alert')}}
        </div>
        @endif
        @csrf
        <div class="form-group-1">
          <div class="row">
            <div class="col-md-6">
              @if($errors->has('first_name'))
              <div class="help-block">
                {{$errors->first('first_name')}}
              </div>
              @endif
              <input type="text" name="first_name" id="first_name" placeholder="Họ" />
            </div>
            <div class="col-md-6">
              @if($errors->has('last_name'))
              <div class="help-block">
                {{$errors->first('last_name')}}
              </div>
              @endif
              <input type="text" name="last_name" id="last_name" placeholder="Tên" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              @if($errors->has('birth'))
              <div class="help-block">
                {{$errors->first('birth')}}
              </div>
              @endif
              <input type="text" id="datepicker" name="birth" placeholder="Ngày sinh">
            </div>
            <div class="col-md-6">
              <div class="form-group" style="border: 1px solid #4D4545;">
                <div class="radio container-fluid">
                  <label for="">Giới tính:</label>
                  <div class="radio">
                    <label>
                      <input type="radio" class="flat-red" name="gender" value="1" checked="checked">
                      <span>Nam</span> <i class="fa fa-mars"></i>
                    </label>
                    <label>
                      <input type="radio" class="flat-red" name="gender" value="0">
                      <span>Nữ</span> <i class="fa fa-venus"></i>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if($errors->has('username'))
          <div class="help-block">
            {{$errors->first('username')}}
          </div>
          @endif
          <input type="text" name="username" id="username" placeholder="Tên đăng nhập" />
          @if($errors->has('email'))
          <div class="help-block">
            {{$errors->first('email')}}
          </div>
          @endif
          <input type="email" name="email" id="email" placeholder="Email" />
          @if($errors->has('phone'))
          <div class="help-block">
            {{$errors->first('phone')}}
          </div>
          @endif
          <input type="number" name="phone" placeholder="Số điện thoại" />
          @if($errors->has('address'))
          <div class="help-block">
            {{$errors->first('address')}}
          </div>
          @endif
          <input type="text" name="address" placeholder="Địa chỉ" />
          <!-- <div class="select-list">
            <select name="course_type" id="course_type">
              <option slected value="">Quốc gia</option>
              <option value="society">Việt Nam</option>
              <option value="language">Nhật Bản</option>
              <option value="language">Hoa Kỳ</option>
              <option value="language">Trung Quốc</option>
              <option value="language">Italia</option>
              <option value="language">Anh Quốc</option>
              <option value="language">Hàn Quốc</option>
            </select>
          </div> -->
        </div>
        <div class="form-group-2">
          <h3>Bảo mật</h3>
          @if($errors->has('password'))
          <div class="help-block">
            {{$errors->first('password')}}
          </div>
          @endif
          <input type="password" name="password" placeholder="Mật khẩu" />
          @if($errors->has('password_confirmation'))
          <div class="help-block">
            {{$errors->first('password_confirmation')}}
          </div>
          @endif
          <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" />
        </div>
        <div class="form-check">
          <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
          <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với các   <a href="#" class="term-service">Điều khoản và Điều kiện</a></label>
        </div>
        <div class="form-submit">
          <input type="submit" id="submit" class="submit" value="ĐĂNG KÝ" />
        </div>
        <div class="text-center">
         <a href="{{route('Sign-in.index')}}" class="txt2 hov1 text-primary">
          Tôi đã có tài khoản rồi
        </a>
      </div>
    </form>
  </div>

</div>


<!--===============================================================================================-->
<script src="{{url('public/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('public/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{url('public/js/jquery.waypoints.min.js')}}"></script>
<script src="{{url('public/js/jquery.stellar.min.js')}}"></script>
<script src="{{url('public/js/owl.carousel.min.js')}}"></script>
<script src="{{url('public/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('public/js/aos.js')}}"></script>
<script src="{{url('public/js/scrollax.min.js')}}"></script>
<script src="{{url('public/js/register/main.js')}}"></script>
<script src="{{url('public/js/main.js')}}"></script>
<script src="{{url('public/vendor/iCheck/icheck.min.js')}}"></script>
<script src="{{url('public/js/custom.js')}}"></script>
<script src="{{url('public/vendor/jQueryUI/jquery-ui.min.js')}}"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      showAnim: 'slideDown',
      changeMonth: true,
      changeYear: true,
      yearRange: "-80:+0",
      dateFormat: "dd/mm/yy"
    });
  });
  function imgPreview(input) {
    if (input.files && input.files[0]) {
      var file = new FileReader();
      file.onload = function (img) {
        $html = '<img src="'+img.target.result+'" class="img-thumbnail" width="100%" style="margin-bottom: 15px;">';
        $('.preview').html($html);
      };
      file.readAsDataURL(input.files[0]);
    }
  }
</script>
</body>
</html>