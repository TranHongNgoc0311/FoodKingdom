@extends('Frontend.layouts.main')
@section('title','đơn hàng mã: '.$order->id)
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="{{url('public/vendor/Ionicons/css/ionicons.min.css')}}">
@stop('css')
@section('style')
<style>
.menu-wrap{
	padding: 10px;
	margin-bottom: 35px;
}
.intro-section {
	padding: 50px 0;
	position: relative;
	background-size: cover;
	z-index: 1;
	font-size: 16px;
	font-family: 'Poppins', serif;
	width: 100%;
	margin: 0;
	font-weight: 400;
	word-wrap: break-word;
	color: #333;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	background-image: url({{url('public/images/service/'.$order->service->image)}});
}
.intro-section .heading-wrapper {
	padding: 30px 40px 20px;
	margin-bottom: 50px;
	background: #FFAD01;
	color: #fff;
}
.intro {
	color: #fff;
	background: rgba(53,47,47,0.75);
}
.intro .profile-img {
	max-width: 400px;
	border-radius: 5px;
	overflow: hidden;
}
.margin-b-30 {
	margin-bottom: 30px;
}
h2 {
	font-size: 2.2em;
	line-height: 1.1;
}
h1, h2, h3 {
	font-family: 'Poppins', cursive;
}
.font-yellow {
	color: #FFA600;
}
h4 {
	font-size: 1.3em;
}
h1, h2, h3, h4, h5, h6 {
	line-height: 1.5;
	font-weight: inherit;
}
.margin-tb-30 {
	margin-top: 30px;
	margin-bottom: 30px;
}
.intro .information > li {
	display: block;
	margin: 5px 0;
}
li {
	list-style: none;
	display: inline-block;
}
img {
	width: 100%;
}
h1, h2, h3, h4, h5, h6, p, a, ul, span, li, img, inpot, button {
	margin: 0;
	padding: 0;
}
.font-h4{
	margin: 0;
	padding: 0;
	line-height: 1.5;
	font-weight: inherit;
	font-size: 1.3em;
}
@media only screen and (max-width: 1200px){
	.about-section {
		text-align: center;
	}
}
.section .heading {
	margin-bottom: 60px;
	display: inline-block;
}
.section .heading:before {
	content: '';
	height: 10px;
	width: 50px;
	border-radius: 5px;
	margin: 0 auto 20px;
	display: block;
	background: #FFA804;
}
.section {
	padding: 100px 0 50px;
}
h6 {
	font-size: .9em;
	letter-spacing: 1px;
}
.intro-section .info {
	margin-bottom: 10px;
}
.intro-section .info .icon {
	float: left;
	font-size: 30px;
}
.icon {
	font-size: 1.1em;
	display: inline-block;
	line-height: inherit;
}
.intro-section .info .right-area {
	margin-left: 45px;
}
</style>
@stop('style')
@section('content')
<section class="intro-section">
	<div class="container">
		
		<div class="heading-wrapper">
			<div class="row">

				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="info">
						<i class="icon ion-bookmark"></i>
						<div class="right-area">
							<h5>Mã đơn:</h5>
							<h6><span class="label label-default">{{$order->id}}</span></h6>
						</div><!-- right-area -->
					</div><!-- info -->
				</div><!-- col-sm-4 -->

				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="info">
						<i class="icon ion-android-checkbox-outline"></i>
						<div class="right-area">
							<h5>TRẠNG THÁI:</h5>
							<h6>
								@if($order->status == 1)
								<span class="label label-primary">CHỜ DUYỆT</span>
								@elseif($order->status == 2)
								<span class="label label-info">ĐÃ DUYỆT</span>
								@elseif($order->status == 3)
								<span class="label label-warning">CHỜ THANH TOÁN</span>
								@elseif($order->status == 4)
								<span class="label label-danger">HỦY</span>
								@else
								<span class="label label-success">HOÀN TẤT</span>
								@endif
							</h6>
						</div><!-- right-area -->
					</div><!-- info -->
				</div><!-- col-sm-4 -->

				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="info">
						<i class="icon ion-ios-clock-outline"></i>
						<div class="right-area">
							<h5>
								NGÀY TẠO: 
								<span class="text-muted">{{date('M d, Y',strtotime($order->created_at))
								.' at '.date('H:m:s',strtotime($order->created_at))}}</span>
							</h5>
							<h6>
								CẬP NHẬT: 
								<span class="text-muted">{{date('M d, Y',strtotime($order->updated_at))
								.' at '.date('H:m:s',strtotime($order->updated_at))}}</span>
							</h6>
						</div><!-- right-area -->
					</div><!-- info -->
				</div><!-- col-sm-4 -->
			</div><!-- row -->
		</div><!-- heading-wrapper -->

		
		<div class="intro">
			<div class="container-fluid">
				
				

				<div class="container-fluid">		
					<h2><b style="text-transform: uppercase;">
						{{$order->service->name}} 
					</b></h2>
					<p><span class="font-yellow font-h4">{{($order->service_type == 1)?'Tại gia':'Tại Food - Kingdom'}}</span></p>
					<div class="col-md-6">
						<ul class="information margin-tb-30">
							<li><b class="font-yellow">NGƯỜI NHẬN</b> : {{$order->first_name}} {{$order->last_name}}</li>
							<li><b class="font-yellow">EMAIL</b> : {{$order->email}}</li>
							<li><b class="font-yellow">SỐ ĐIỆN THOẠI</b> : {{$order->phone}}</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="information margin-tb-30">
							<li><b class="font-yellow">Địa chỉ</b> : <small>{{$order->address}}</small></li>
							<li><b class="font-yellow">SỐ BÀN (SUẤT)</b> : {{$order->table_count}}</li>
							<li><b class="font-yellow">TỔNG</b> : {{$total_price}} VNĐ</li>
						</ul>
					</div>
				</div>

			</div><!-- row -->
			
		</div><!-- intro -->
	</div><!-- container -->
</section>
<section class="about-section section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="heading ">
					<h3 class="text-danger"><b>Menu</b></h3>
					<h6 class="font-lite-black text-muted"><b>Các món đã chọn</b></h6>
				</div>
			</div>

			<div class="col-sm-12" id="counter">
				<div class="row">
					@foreach($order->details as $detail)
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 text-center ftco-animate" style="margin: auto;">
						<div class="menu-wrap">
							<div class="menu-img img mb-4" style="background-image: url({{url('public/images/products/'.$detail->menu->image)}});"></div>
							<div class="text">
								<h4 style="color: #fff;">{{$detail->menu->name}}</h4>
								<p><b style="color: #fff;">Giá:</b> <span class="text-muted">{{$detail->menu->price}} VNĐ</span></p>
							</div>
						</div>
					</div>
					@endforeach
				</div><!-- row-->
			</div><!-- col-sm-12 -->

		</div><!-- row -->
	</div><!-- container -->
</section><!-- about-section -->
@stop()