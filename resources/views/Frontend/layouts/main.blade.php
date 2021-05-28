<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food - Kingdom | @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon shortcut" href="{{url('public/images/page_logo.png')}}" type="x-icon/gif">
  
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

  <link rel="stylesheet" href="{{url('public/css/open-iconic-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('public/css/animate.css')}}">
  
  <link rel="stylesheet" href="{{url('public/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('public/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{url('public/css/magnific-popup.css')}}">

  <link rel="stylesheet" href="{{url('public/css/aos.css')}}">
  <link rel="stylesheet" href="{{url('public/css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{url('public/css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{url('public/css/jquery.timepicker.css')}}">

  
  <link rel="stylesheet" href="{{url('public/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{url('public/fonts/font-awesome-4.7.0/css/font-awesome.css')}}" />
  <link rel="stylesheet" href="{{url('public/css/icomoon.css')}}">
  <link rel="stylesheet" href="{{url('public/css/style.css')}}">

  @yield('css')
  <script>
    var base_url = function () {
      return "{{url('')}}";
    };

    var akey = function (argument) {
      return "multiple_universer_from_earth1_move_to_earth2_with_name_HongTran0311_password_earth3";
    };
  </script>
</head>
@yield('style')
<style>
.help-block{
  color: #EF0A0A;
  font-weight: bold;
}
.services .icon {
 margin: 20px auto;
}
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}"><span class="flaticon-chef mr-1"></span>Food<br><small>KingDom</small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Trang chủ</a></li>
          <li class="nav-item active"><a href="{{route('menu')}}" class="nav-link">Menu</a></li>
          <li class="nav-item"><a href="{{route('service.index')}}" class="nav-link">Dịch vụ</a></li>
          <li class="nav-item"><a href="{{route('blog.index')}}" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="{{route('about')}}" class="nav-link">Giới thiệu</a></li>
          <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Liên hệ</a></li>
          @if(!Auth::guard('customer')->check())
          <li class="nav-item"><a href="{{route('Sign-in.index')}}" class="nav-link btn btn-primary text-muted">Đăng nhập</a></li>
          @endif
        </ul>
        @if(Auth::guard('customer')->check())
        <ul class="navbar-nav ml-auto navbar-right">
          <li class="nav-item">
            <a href="{{route('Customer.index')}}" class="nav-link btn btn-primary text-muted text-left"> 
              {{Auth::guard('customer')->user()->first_name}} {{Auth::guard('customer')->user()->last_name}}
            </a>
          </li>
          <li class="nav-item"><a href="{{route('sign_out')}}" class="nav-link">Đăng xuất</a></li>
        </ul>
        @endif
      </div>
    </div>
  </nav>
  <!-- END nav -->
  @if(Session::has('login_success'))
  <div class="alert alert-success container">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Thông báo!</strong> {{Session::get('login_success')}}
  </div>
  @endif
  @if(Session::has('success'))
  <div class="alert alert-success container">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Thông báo!</strong> {{Session::get('success')}}
  </div>
  @endif
  @yield('content')

  <footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Về chúng tôi</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Blog gần đây</h2>
            @foreach($layout_blog as $blog)
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url({{url('public/images/blog/'.$blog->image)}});"></a>
              <div class="text">
                <h3 class="heading"><a href="#">{{substr($blog->title,0,51)}}</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> {{date('M d, Y',strtotime($blog->updated_at))}}</a></div>
                  <div><a href="#"><span class="icon-person"></span> {{$blog->user->name}}</a></div>
                  <div><a href="#"><span class="icon-chat"></span> {{count($blog->comments)}}</a></div>
                  <div><a href="#"><span class="icon-eye"></span> {{$blog->view}}</a></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
         <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Dịch vụ</h2>
          <ul class="list-unstyled">
            @foreach($layout_service as $service)
            <li><a href="{{route('service.show',['slug' => $service->slug])}}" class="py-2 d-block">{{$service->name}}</a></li>
            @endforeach
            <li><a href="{{route('service.index')}}" class="py-2 d-block">Thêm...</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Bạn có thắc mắc?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"></span><span class="text">Số 127 Thái Hà - Hà Nội <br><small>Đối diện khách sạn Giant Beer</small></span></li>
              <li><a href="#"><span class="icon icon-phone"></span><span class="text">0363311904</span></a></li>
              <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><small>luonluonvaluonluon@gmail.com</small></span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

        <p>
         Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Grod'IT</a>
       </p>
     </div>
   </div>
 </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{url('public/js/jquery.min.js')}}"></script>
<script src="{{url('public/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{url('public/js/popper.min.js')}}"></script>
<script src="{{url('public/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/js/jquery.easing.1.3.js')}}"></script>
<script src="{{url('public/js/jquery.waypoints.min.js')}}"></script>
<script src="{{url('public/js/jquery.stellar.min.js')}}"></script>
<script src="{{url('public/js/owl.carousel.min.js')}}"></script>
<script src="{{url('public/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('public/js/aos.js')}}"></script>
<script src="{{url('public/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{url('public/js/bootstrap-datepicker.js')}}"></script>
<script src="{{url('public/js/jquery.timepicker.min.js')}}"></script>
<script src="{{url('public/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{url('public/js/google-map.js')}}"></script>
<script src="{{url('public/js/main.js')}}"></script>
@yield('js')
</body>
</html>